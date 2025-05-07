# 🏎️ F1 Pulse — Formula 1 Simulation Web App

Welcome to **F1 Pulse**, a dynamic Formula 1 web platform built with **Laravel** that brings the thrill of race simulations, live countdowns, and Grand Prix tracking to your fingertips.

## 📦 Tech Stack

- **Backend**: Laravel 10 (PHP 8+)
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze (or Jetstream, if applicable)
- **Media Storage**: Laravel Filesystem (local/public)
- **Other**: Eloquent ORM, Laravel routing, Middleware, Controllers

---

## 🚀 Getting Started

### 1. Clone the Repository


git clone https://github.com/yourusername/f1-pulse.git
cd f1-pulse
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
Update your .env with your local database credentials and other necessary values.
php artisan migrate --seed
php artisan serve
✨ Key Features
🏁 Race Simulation Engine
Users can run simulated F1 races, where results are generated based on logic that accounts for randomized performance and reliability factors. These simulations are stored and viewable historically.

Create new simulations

View simulation history

Each simulation is linked to a user and a specific race

⏱️ Live Countdown to Next Grand Prix
A dynamic JavaScript countdown timer shows the time remaining until the next Grand Prix event. It's auto-calculated from the database-stored race schedule and updates every second in real-time.

📅 Race Schedule Management
Admin users can:

Add new races (name, date, round, circuit)

Upload or link circuit images

View and edit existing races

👥 Authentication & User System
User registration and login

Each simulation is attributed to a specific user

Optional admin dashboard (if implemented)

📊 Race Dashboard Highlights
Total races

Total simulations run

Next GP preview with countdown and circuit image

Embedded highlight videos for immersive experience
Simulation Logic: Implemented in SimulationController — uses random functions to generate positions, optionally based on car/team performance.

Countdown: Pure JavaScript (inline) in Blade, uses created_at or scheduled date from the next upcoming race.

YouTube Embeds: Easily changeable in Blade files for highlight videos.

Styling: Tailwind CSS is used for a modern, responsive F1-themed UI.
🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss the proposed updates.

🏁 Credits
Developed with ❤️ for F1 fans by [Innocencia and Diana].