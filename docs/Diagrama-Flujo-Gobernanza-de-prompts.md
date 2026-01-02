┌──────────────────────────────┐
│ A. INITIALIZATION PROMPTS    │
│ (one-time, system lock)      │
└──────────────┬───────────────┘
               │
               ▼
┌──────────────────────────────┐
│ B. TASK EXECUTION PROMPTS    │◄──────────────┐
│ (role-based execution)       │               │
└──────────────┬───────────────┘               │
               │                               │
               ▼                               │
┌──────────────────────────────┐               │
│ C. QA VALIDATION PROMPTS     │               │
│ (PASS / FAIL only)           │               │
└───────┬───────────┬──────────┘               │
        │           │                          │
        │ PASS      │ FAIL                     │
        ▼           ▼                          │
┌────────────┐   ┌────────────────────────┐    │
│ Continue   │   │ D. INCIDENT PROMPTS    │ ───┘
│ workflow   │   │ (governance / security)│
└────┬───────┘   └──────────┬─────────────┘
     │                      │
     ▼                      ▼
┌──────────────────────────────┐
│ E. MAINTENANCE / CHANGE      │
│ PROMPTS (controlled evolution)│
└──────────────┬───────────────┘
               │
               ▼
        ┌──────────────┐
        │ Back to B or │
        │ New Project  │
        └──────────────┘
