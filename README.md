<<<<<<< HEAD
# Vasudha - Hostel Management System (Packaged)
This package contains:
- migrations/01_create_schema.sql  --> Create database schema
- seed/seed_data.sql              --> Inserts 50 students and related data
- backend/*.php                   --> Simple PHP backend (PDO) for login, view, complaints, fines, payments
- frontend/*.html                 --> Simple Bootstrap frontend
- README.md                       --> This file

## Quick setup
1. Create a MySQL database:
   - `CREATE DATABASE vasudha_hostel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`
2. Run migrations:
   - `mysql -u root -p vasudha_hostel < migrations/01_create_schema.sql`
3. Seed data:
   - `mysql -u root -p vasudha_hostel < seed/seed_data.sql`
4. Put `backend` folder in your PHP server root (e.g., /var/www/html/vasudha) and update `db.php` credentials.
5. Open `frontend/index.html` in browser (or serve via web server) and use the app.

## Notes
- Admin creation: You can run `register_admin.php` once to create an admin with a secure password.
- The seed uses placeholder password hashes; please re-create admin/student accounts via `register_admin.php` or update the Users table with proper password_hash values using PHP's password_hash.
- The view_students.php is fixed to avoid common SQL bugs and uses prepared statements.

If you want, I can now:
- Patch your uploaded zip directly (if you upload the project files or allow me to read them).
- Convert backend to Node/Express or Python Flask.
- Expand frontend with forms for complaints, payments, fines.

