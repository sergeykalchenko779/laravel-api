# Laravel API

## Getting Started

### Step 1: Clone the Repository

```bash
git clone git@github.com:sergeykalchenko779/laravel-api.git
cd laravel-api
```

### Step 2: Set up Environment Variables

```bash
cp src/.env.dev src/.env
```

### Step 3: Build Docker Containers

```bash
docker compose build
```

### Step 3: Run Docker Containers

```bash
docker compose up -d
```

### Step 4: Install Composer Dependencies

```bash
docker exec laravel-laravel.test-1 composer install
```

### Step 5: Run Migrations

```bash
./vendor/bin/sail artisan migrate
```

### Step 6: Testing

```bash
./vendor/bin/sail artisan test
```

### Testing via postman

Open Postman and create request:

uri: <application_url>/api/submission

data: 
```json
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}

```
