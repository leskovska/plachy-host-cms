# Band Website

This is the README file for a Laravel-based website 
for the "Plachý host" band to share future concert information and videos. 
The website includes an administration panel for managing 
the content.

I plan to add more features as sharing photos, 
administration of menu items and newsletter for fans, and some
way for administrating users.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Administration Panel](#administration-panel)
- [Development](#development)
- [Contributing](#contributing)
- [License](#license)

## Features

- Display future concert information
- Share videos
- Administration panel for managing content
- Built with Laravel, using Laravel Sail for local development
- Uses Filament Forms for administration
- Tailwind was used for styling

## Requirements

- Composer
- Docker
- Node.js, npm

## Installation

1. Clone the repository:

```
git clone https://github.com/leskovska/plachy-host-cms
```

2. Change into the project directory:

```
cd plachy-host-cms
```

3. Install PHP dependencies:

```
composer install
```

4. Configure the environment variables by copying the `.env.example` file to `.env`:

```
cp .env.example .env
```

5. Configure the database connection by updating the following variables in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

6. Build docker container:

```
sail build
```

7. Ensure that Docker is installed and running on your system and you can run sail now:

```
sail up
```

8. Install JavaScript dependencies:

```
npm install
```

9. Generate the application key:

```
sail php artisan key:generate
```

10. Migrate the database with generated fake data:

```
sail php artisan migrate --seed
```

11. Compile the frontend assets:

```
npm run dev
```

12. Create link to folder with images:

```
sail php artisan storage:link
```

13. Finally visit the website in your browser at `http://localhost`.

## Administration Panel

The administration panel allows you to manage the content of the website. 
To access the administration panel, visit `http://localhost/admin` in your browser. 
You will be prompted to enter your admin credentials.
Once logged in, you can perform various administrative 
tasks such as adding/editing concerts or 
uploading videos from youtube.


## Set up local testing

1. ```cp env.testing.example env.testing```
2. change any values if needed
3. ```sail php artisan migrate --env=testing```
4. ```sail php artisan test```

## License

This Band Website is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT). You can find a copy of the license in the `LICENSE` file.
