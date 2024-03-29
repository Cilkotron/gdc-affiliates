# GDCAffiliates Laravel project 

This is a Laravel project configured to use Vite for frontend development.

1. **Prerequisites**

    Make sure you have the following installed:
    - [Node.js](https://nodejs.org/)
    - [npm](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/)
    - [Composer](https://getcomposer.org/)

2. **Installation**

    1. Clone this repository:
        ```bash
        git clone https://github.com/Cilkotron/gdc-affiliates
        ```

    2. Navigate to the project directory:
        ```bash
        cd gdc-affiliates
        ```

    3. Install PHP dependencies:
        ```bash
        composer install
        ```

    4. Install Node.js dependencies:
        ```bash
        npm install
        # or
        yarn install
        ```

3. **Usage**

    - **Development**: To start the development server with hot module replacement (HMR), run:
        ```bash
        npm run dev
        # or
        yarn dev
        ```

        This will start the Laravel development server and the Vite frontend development server. Your Laravel application will be accessible at `http://localhost:8000`, and the Vite development server will be accessible at ` http://localhost:5173/`.

    - **Production**: To build your assets for production, run:
        ```bash
        npm run build
        # or
        yarn build
        ```

        This will generate optimized production-ready assets in the `public` directory.

    - **Testing**: You can run tests for your Laravel application using:
        ```bash
        php artisan test
        ```

4. **License**

    This project is licensed under the [MIT License](LICENSE).
