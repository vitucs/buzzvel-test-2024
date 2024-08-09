# Holiday API

This project is a Laravel-based API for managing holiday plans. It includes endpoints for creating, reading, updating, and deleting holidays, as well as generating a PDF summary of a holiday plan.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-repository.git
    cd your-repository
    ```

2. Install the dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env` file and set your environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run the migrations:
    ```bash
    php artisan migrate
    ```

5. Install Passport:
    ```bash
    php artisan passport:install
    ```

6. Add Passport configuration to your `.env` file:
    ```env
    PASSPORT_CLIENT_ID=your-client-id
    PASSPORT_CLIENT_SECRET=your-client-secret
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## Authentication

To use the API, you need to authenticate and obtain an access token.

### Get the access token

- **Endpoint**: `POST /oauth/token`
- **Body**:
  ```json
  {
      "username": "test@example.com",
      "password": "password",
      "grant_type": "password",
      "client_id": "2",
      "client_secret": "3PcmVG8GEmubXgHYh7k8wbR0bdAwgFQSU5zOr9ny"
  }

### Create a Holiday

- **Endpoint**: `POST /api/holidays`
- **Headers**: {
                    Authorization: Bearer your-access-token
                    Content-Type: application/json
                }
- **Body**:
  ```json
    {
        "title": "Christmas Holiday",
        "description": "Celebrate Christmas with family and friends.",
        "date": "2023-12-25",
        "location": "New York",
        "participants": ["Alice", "Bob", "Charlie"]
    }

- **Response**:
  ```json
    {
        "id": 1,
        "title": "Christmas Holiday",
        "description": "Celebrate Christmas with family and friends.",
        "date": "2023-12-25",
        "location": "New York",
        "participants": ["Alice", "Bob", "Charlie"],
        "created_at": "2023-08-06T12:34:56.000000Z",
        "updated_at": "2023-08-06T12:34:56.000000Z"
    }

### Get All Holidays

- **Endpoint**: `GET  /api/holidays`
- **Headers**: {
                    Authorization: Bearer your-access-token
                }

- **Response**:
  ```json
    {
        "id": 1,
        "title": "Christmas Holiday",
        "description": "Celebrate Christmas with family and friends.",
        "date": "2023-12-25",
        "location": "New York",
        "participants": ["Alice", "Bob", "Charlie"],
        "created_at": "2023-08-06T12:34:56.000000Z",
        "updated_at": "2023-08-06T12:34:56.000000Z"
    }

### Get a Single Holiday

- **Endpoint**: `GET  /api/holidays/{id}`
- **Headers**: {
                    Authorization: Bearer your-access-token
                }

- **Response**:
  ```json
    {
        "id": 1,
        "title": "Christmas Holiday",
        "description": "Celebrate Christmas with family and friends.",
        "date": "2023-12-25",
        "location": "New York",
        "participants": ["Alice", "Bob", "Charlie"],
        "created_at": "2023-08-06T12:34:56.000000Z",
        "updated_at": "2023-08-06T12:34:56.000000Z"
    }

### Update a Holiday

- **Endpoint**: `PUT  /api/holidays/{id}`
- **Headers**: {
                    Authorization: Bearer your-access-token
                    Content-Type: application/json
                }

- **Body**:
  ```json
    {
        "title": "Updated Christmas Holiday",
        "description": "Celebrate Christmas with family and friends.",
        "date": "2023-12-25",
        "location": "New York",
        "participants": ["Alice", "Bob", "Charlie"]
    }

- **Response**:
  ```json
    {
        "id": 1,
        "title": "Christmas Holiday",
        "description": "Celebrate Christmas with family and friends.",
        "date": "2023-12-25",
        "location": "New York",
        "participants": ["Alice", "Bob", "Charlie"],
        "created_at": "2023-08-06T12:34:56.000000Z",
        "updated_at": "2023-08-06T12:34:56.000000Z"
    }

### Delete a Holiday

- **Endpoint**: `DELETE  /api/holidays/{id}`
- **Headers**:  {
                    Authorization: Bearer your-access-token
                }
- **Response**:
  ```json
    {
        "message": "Holiday deleted successfully."
    }

### Generate PDF for Holiday Plan

- **Endpoint**: `GET   /api/holidays/{id}/pdf`
- **Headers**: {
                    Authorization: Bearer your-access-token
                }
- **Response**: The response will be a PDF document containing the details of the holiday.