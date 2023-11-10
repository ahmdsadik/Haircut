# Stylist Appointment Management System

## Overview

This project is a Stylist Appointment Management System implemented with Laravel and Livewire. It allows stylists to manage their working hours and view available time slots for appointments.

## Features

- **Working Hours Management:** Stylists can set their working hours for each day.
- **Appointment Booking:** Clients can book appointments during the available time slots.
- **Real-time Updates:** Utilizes Livewire for real-time updates without page reloads.
- **Responsive Design:** Ensures a seamless experience on various devices.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/ahmedmoha2050/Haircut.git
    ```

2. Navigate to the project directory:

    ```bash
    cd stylist-appointment-system
    ```

3. Install dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

4. Set up the environment:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

   Update the `.env` file with your database credentials.


5. Migrate and Seed the database:

    ```bash
    php artisan migrate --seed
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

   Access the application at [http://localhost:8000](http://localhost:8000).

## Usage

- Visit the application and log in as a stylist to manage working hours.
- Dashboard link is [http://localhost:8000/dashboard](http://localhost:8000/dashboard).
- Login credentials for a admin are :
  - Email: `admin@example.com`
  - Password: `password`
- Clients can visit and book appointments during available time slots.

## Contributing

Feel free to contribute to the development of this project by submitting issues or pull requests.
