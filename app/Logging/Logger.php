<?php
/**
 * Logger centralizado.
 * Acepta nivel, mensaje y contexto opcional.
 * Formatea entradas con timestamp, nivel, mensaje y contexto.
 * Escribe logs en archivos diarios en el sistema de archivos.
 * Maneja fallos si el directorio no es escribible.
 */

declare(strict_types=1);

namespace App\Logging;

class Logger
{
    protected string $logPath;
    protected string $dateFormat;
    protected string $minimumLevel;
    protected array $levelsPriority = [
        'DEBUG' => 0,
        'INFO' => 1,
        'WARNING' => 2,
        'ERROR' => 3,
        'CRITICAL' => 4,
    ];

    public function __construct(string $logPath, string $dateFormat, string $minimumLevel)
    {
        $this->logPath = rtrim($logPath, DIRECTORY_SEPARATOR);
        $this->dateFormat = $dateFormat;
        $this->minimumLevel = $minimumLevel;
    }

    /**
     * Registra un mensaje de log.
     * 
     * @param string $level Nivel de severidad.
     * @param string $message Mensaje a registrar.
     * @param array $context Contexto adicional (opcional).
     * @return void
     */
    public function log(string $level, string $message, array $context = []): void
    {
        if (!$this->shouldLog($level)) {
            return;
        }

        $date = new \DateTime();
        $timestamp = $date->format($this->dateFormat);
        $contextString = $this->formatContext($context);
        $logEntry = sprintf("[%s] %s: %s%s%s\n", $timestamp, $level, $message, $contextString ? ' | ' : '', $contextString);

        $this->writeLog($logEntry);
    }

    /**
     * Determina si el nivel de log debe ser registrado según la configuración.
     * 
     * @param string $level
     * @return bool
     */
    protected function shouldLog(string $level): bool
    {
        return $this->levelsPriority[$level] >= $this->levelsPriority[$this->minimumLevel];
    }

    /**
     * Formatea el contexto para incluirlo en el log.
     * 
     * @param array $context
     * @return string
     */
    protected function formatContext(array $context): string
    {
        if (empty($context)) {
            return '';
        }
        return json_encode($context, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Escribe la entrada de log en el archivo correspondiente.
     * 
     * @param string $logEntry
     * @return void
     */
    protected function writeLog(string $logEntry): void
    {
        $filename = sprintf('app-%s.log', (new \DateTime())->format('Y-m-d'));
        $filePath = $this->logPath . DIRECTORY_SEPARATOR . $filename;

        if (!is_dir($this->logPath) || !is_writable($this->logPath)) {
            // No se puede escribir en el directorio de logs, falla silenciosa
            return;
        }

        file_put_contents($filePath, $logEntry, FILE_APPEND | LOCK_EX);
    }
}
