# Week 5 – Database Components and CRUD Operations (Car Hire System)

```
Week5/
│
├── index.php                  → Task 4: READ – list all vehicles
├── add_vehicle.php             → Task 4: CREATE – add vehicle form
├── add_vehicle_process.php      → Task 4: CREATE – insert into database
├── edit_vehicle.php             → Task 4: UPDATE – edit vehicle form
├── edit_vehicle_process.php      → Task 4: UPDATE – save changes
├── delete_vehicle.php            → Task 4: DELETE – remove vehicle
├── db_fetch_demo.php              → Task 5 & 6: connection + fetch demo
│
├── css/
│   └── style.css                → Shared stylesheet
│
├── js/                          → (reserved for future JS files)
│
├── includes/
│   └── db.php                    → Database connection + table creation
│
└── database/
    └── Week5db.sql                 → Exported database (create after testing)
```

## How to export your database (Week5db.sql)

1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Click on **week5db** in the left sidebar
3. Click the **Export** tab at the top
4. Leave method as **Quick** and format as **SQL**
5. Click **Go** — this downloads `week5db.sql`
6. Move that file into `Week5/database/Week5db.sql`

This backup lets you restore your database at any time and is part of the
version control workflow described in the lesson (Week1db.sql, Week2db.sql, etc.).

## CRUD Operations Implemented

| Operation | File | What it does |
|-----------|------|---------------|
| Create | add_vehicle.php + add_vehicle_process.php | Adds a new vehicle to the fleet |
| Read | index.php | Lists all vehicles in a table |
| Update | edit_vehicle.php + edit_vehicle_process.php | Edits an existing vehicle's details |
| Delete | delete_vehicle.php | Removes a vehicle record permanently |
