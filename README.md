# Book Rental Application

## Overview

The Book Rental Application is a platform that allows users to rent books from other users in their neighborhood. Users can register as book owners or renters, enabling them to earn money by renting out their books. The application is built using Laravel for the backend and supports MySQL as the database.

## Features

- **User Types**:
  - **Book Renters**: Users who can rent books.
  - **Book Owners**: Users who can upload their books for rent.
  - **System Admins**: Users who monitor and manage book owners and rentals.

- **Dashboards**:
  - **Owner Dashboard**: Allows book owners to manage their books, including uploading, updating, and removing book listings.
  - **Admin Dashboard**: Allows system admins to manage book owners and their listings, including approving new owners and filtering books.

## Technology Stack

- **Backend**: Laravel 10
- **Frontend**: Blade templates 
- **Database**: MySQL
- **Authentication**: Laravel Passport

## Setup Instructions

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Bereketmuniye/book_rental_application.git
   cd book_rental_application
2. **Install dependencies**:
    ```bash
         composer install
         npm install
 3. **Environment Configuration**:
      **Copy the .env.example file to .env**:
       ```bash
    cp .env.example .env
 5. **Generate Application Key**:
    ```bash 
        php artisan key:generate
 6. **Run Migrations**:
      ```bash
          php artisan migrate
 7. **Run the Application**:
      ```bash
      php artisan serve

