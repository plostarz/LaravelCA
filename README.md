# 🏎️ F1 Pulse — Formula 1 Simulation Web App

Welcome to **F1 Pulse**, a dynamic Formula 1 web platform built with **Laravel** that brings the thrill of race simulations, live countdowns, and Grand Prix tracking to your fingertips.

---

## 📦 Tech Stack

- **Backend**: Laravel 10 (PHP 8+)
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze (or Jetstream, if applicable)
- **Media Storage**: Laravel Filesystem (local/public)
- **Other**: Eloquent ORM, Laravel routing, Middleware, Controllers

---

## 🚀 Getting Started

### 1. Clone and Set Up the Project

To get the app running locally:

- Clone the repository:
  ```bash
  git clone https://github.com/yourusername/f1-pulse.git
  cd f1-pulse
-Install PHP dependencies:composer install
-Install and compile front-end assets:npm install && npm run build
-Copy the example environment file and generate the app key:
Update .env with your local database credentials.
-Run migrations and seed initial data:php artisan migrate --seed
-Start the development server: php artisan serve
✨ Key Features
🏁 Race Simulation Engine
Run simulated F1 races using a logic engine that includes performance and reliability randomness.

Simulations are user-specific and tied to existing Grand Prix events.

View and revisit past simulations anytime.

⏱️ Live Countdown to Next Grand Prix
Real-time countdown timer built with vanilla JavaScript.

Automatically counts down to the next race date in the database.

📅 Race Schedule Management
Admin users can:

Add new races (name, date, round, circuit).

Upload or link circuit images.

View and update race details.

👥 Authentication & User System
Secure user registration and login.

Each simulation is saved to a user's account.

Optionally extend with an admin dashboard.

📊 Race Dashboard Highlights
See total races, simulations run, and upcoming Grand Prix previews.

Countdown + Circuit image + Video highlights = immersive dashboard.

🔧 Developer Notes
Simulation Logic: Located in SimulationController, uses randomization to mimic race results.

Countdown Timer: Inline JavaScript in Blade views, calculating time to the next scheduled race.

Video Integration: Easily switch YouTube highlight videos in Blade files.

Styling: Tailwind CSS ensures a clean, fast, responsive, and F1-inspired interface.

🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to propose and discuss your ideas.

🏁 Credits
Developed with ❤️ for F1 fans by Innocencia and Diana.


