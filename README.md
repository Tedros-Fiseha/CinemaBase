# Cinema Management System API

This is a simple cinema management system built with PHP, following the Model-View-Controller (MVC) architecture. It allows managing cinema details, including operational hours, payment methods, and more. This API provides endpoints to fetch cinema details by ID and other functionalities related to cinema management.

## Features

- Register and store cinema information.
- Fetch cinema details by ID, including:
  - Cinema name, location, phone, website, and logo.
  - Operational details (operating hours, seating capacity, screen rooms).
  - Operating hours for each day of the week.
  - Payment methods and languages supported.

## Requirements

- PHP (version 7.x or higher)

## Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/Tedros-Fiseha/CinemaBase.git
cd cinemaBase
php -S localhost:8000 -t public
