module.exports = {
  content: [
    "./public/**/*.php",
    "./public/**/*.html",
    "./views/**/*.php",
    "./src/**/*.js"
  ],

  theme: {
    extend: {

      /* =========================
         COLOR TOKENS (SEMANTIC)
         ========================= */

      colors: {
        /* Dominant colors (70–75%) */
        background: "var(--color-bg-primary)",
        foreground: "var(--color-text-primary)",
        inverse: "var(--color-bg-inverse)",
        "inverse-foreground": "var(--color-text-inverse)",

        /* Neutral support (15–20%) */
        muted: "var(--color-gray-500)",
        "muted-foreground": "var(--color-text-secondary)",
        border: "var(--color-border-default)",

        /* Accent (5–8%) — CTA ONLY */
        cta: "var(--color-cta-primary)",

        /* Alerts (<2%) — NEVER decorative */
        danger: "var(--color-error)"
      },

      /* =========================
         TYPOGRAPHY TOKENS
         ========================= */

      fontFamily: {
        primary: ["var(--font-primary)"]
      }
    }
  },

  plugins: []
}
