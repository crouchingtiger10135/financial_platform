protected $routeMiddleware = [
    // Other middleware
    'password.policy' => \App\Http\Middleware\PasswordPolicy::class,
];
