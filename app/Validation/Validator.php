<?php
declare(strict_types=1);

namespace App\Validation;

/**
 * Validator
 *
 * [ES] Validador simple, determinista y explícito.
 * [ES] No intenta ser Laravel. No es mágico.
 * [ES] Hace exactamente lo que se le pide.
 */
final class Validator
{
    /** @var array<string, string> */
    private array $rules;

    /** @var array<string, string> */
    private array $errors = [];

    /**
     * @param array<string, string> $rules
     *
     * Ejemplo:
     * [
     *   'email' => 'required|email',
     *   'age'   => 'required|numeric'
     * ]
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Ejecuta validación sobre los datos entregados.
     *
     * @param array<string, mixed> $data
     */
    public function validate(array $data): bool
    {
        $this->errors = [];

        foreach ($this->rules as $field => $ruleString) {
            $rules = explode('|', $ruleString);
            $value = $data[$field] ?? null;

            foreach ($rules as $rule) {
                if ($rule === 'required') {
                    if ($value === null || $value === '') {
                        $this->errors[$field] = 'Field is required';
                        break;
                    }
                }

                if ($rule === 'numeric' && $value !== null) {
                    if (!is_numeric($value)) {
                        $this->errors[$field] = 'Field must be numeric';
                        break;
                    }
                }

                if ($rule === 'email' && $value !== null) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$field] = 'Invalid email format';
                        break;
                    }
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * Devuelve errores de validación.
     *
     * @return array<string, string>
     */
    public function errors(): array
    {
        return $this->errors;
    }
}