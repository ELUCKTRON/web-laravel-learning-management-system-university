# 🎓 Web-Based LMS (Laravel + Tailwind + SQLite) — University Project

A full-featured web Learning Management System (LMS) built with **Laravel**, **Tailwind CSS**, and **SQLite**. Supports teacher/student roles, subject and task creation, solution submission and evaluation — all wrapped in a clean, responsive interface. Developed for Semester 4 university coursework.

---

## 📸 Screenshots

### 🧑‍🏫 Teacher View
- Dashboard  
  ![Teacher Dashboard](./assets/teacher/teacher-dashboard.jpeg)
- Create Subject  
  ![Create Subject](./assets/teacher/teacher-create-subject.jpeg)
- Create Task  
  ![Create Task](./assets/teacher/teacher-create-task.jpeg)
- Subjects List  
  ![Subjects List](./assets/teacher/teacher-subjects.jpeg)
- Task List for a Subject  
  ![Subject Tasks](./assets/teacher/teacher-show-tasks.jpeg)
- Task Grading  
  ![Grade Task](./assets/teacher/teacher-task-grade.jpeg)

### 👨‍🎓 Student View
- Dashboard  
  ![Student Dashboard](./assets/student/student-dashboard.jpeg)
- Take a Subject  
  ![Take Subject](./assets/student/student-take-subject.jpeg)
- Tasks for Subject  
  ![View Tasks](./assets/student/student-show-tasks.jpeg)
- Submit Task Solution  
  ![Submit Solution](./assets/student/student-create-solution.jpeg)
- View Task & Submit  
  ![Task Page](./assets/student/student-task.jpeg)
- View Grade  
  ![Graded Task](./assets/student/student-task-grade.jpeg)

### 🔐 Auth Pages
- Landing Page  
  ![Landing](./assets/common/landing.jpeg)
- Login  
  ![Login](./assets/common/login.jpeg)
- Signup  
  ![Signup](./assets/common/signup.jpeg)
- Forgot Password  
  ![Forgot Password](./assets/common/forgot-password.jpeg)

  ### 🔐 Profile
- Profile Page  
  ![Profile](./assets/common/edit-profile.jpeg)

### 📞 Contact Page
- Contact  
  ![Contact](./assets/common/contact.jpeg)


---

## ✨ Features

- 🔐 Authentication system (Laravel Breeze)
- 👨‍🏫 Teacher functionality:
  - Create, edit, soft-delete subjects
  - Add and manage tasks
  - View submitted solutions
  - Evaluate student submissions
- 👨‍🎓 Student functionality:
  - Register and login
  - Join or leave subjects
  - View assigned tasks
  - Submit solutions
- 📊 SQLite database pre-seeded with demo users and subjects
- 🧪 Validation for all forms
- 🌈 Tailwind CSS for responsive design

---

## ⚙️ Tech Stack

- 🐘 **Laravel** — PHP backend framework
- 💅 **Tailwind CSS** — Utility-first CSS framework
- 🗄️ **SQLite** — Lightweight relational database
- 🌐 Laravel Breeze — Simple auth scaffolding
- 🧪 Laravel Migrations + Seeders for demo data

---

## 🚀 How to Run

Make sure you have PHP, Composer, Node.js, and SQLite installed.

```bash
# 📦 Backend Setup
composer install

# 🗃️ Migrate and seed database
php artisan migrate:fresh
php artisan db:seed

# 🔥 Start the development server
php artisan serve
```

The app will be accessible at `http://localhost:8000`.

---

## 🧪 Demo Credentials

**Teacher Login**
- Email: `teacher@classhub.test`
- Password: `teacher123`



**Student Login**
- Email: `student@classhub.test`
- Password: `student123`



---

## 📚 University Info

- 👨‍🎓 Student: Saeed Khanloo  
- 🧠 Course: Advanced Web Development  
- 🗓️ Semester: 4  
- 🏛️ Institution: Eötvös Loránd University (ELTE)  

---

## 🪪 License

MIT License
