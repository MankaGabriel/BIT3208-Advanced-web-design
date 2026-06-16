# Task 4 – Backend Folder Organization (Car Hire System)

This is the professional project structure used for Week 4.

```
Week4/
│
├── index.php              → Task 1: Dynamic welcome form
├── welcome.php             → Task 1: PHP processing page
├── register.php             → Task 2: Registration form
├── register_process.php      → Task 2/3: Registration + password hashing
├── login.php                → Task 3: Login form
├── login_process.php         → Task 3: Login logic + session creation
├── dashboard.php            → Task 3: Session-protected welcome page
├── logout.php               → Destroys the session
├── contact.php               → Task 2: Contact form
├── contact_process.php        → Task 2: Contact form processing
│
├── css/
│   └── style.css            → Shared stylesheet for all pages
│
├── js/                      → (reserved for future JS files)
│
├── includes/
│   └── db.php                → Shared database connection (Task 5 prep)
│
└── database/
    └── Week4db.sql            → Exported database (create after testing)
```

## Why this structure matters

Separating files into `css/`, `js/`, `includes/`, and `database/` folders is standard
practice in real backend frameworks (Laravel, Express.js, Django). It keeps logic,
presentation, and configuration cleanly separated, making the project easier to
maintain, debug, and scale as more features are added in later weeks.
