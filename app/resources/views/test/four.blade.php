<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test - Khaerul Umam</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .form {
                padding: 0 25px;
                text-align: center;
                margin-bottom: 100px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    App Test Four
                </div>

                <textarea readonly=true style="width: 1442px; height: 594px;">
                //Create Abstract Ship

                abstract class Ship
                {
                    protected $name;
                    protected $length;
                    protected $manufacturer;

                    public function __construct($name, $length, $manufacturer)
                    {
                        $this->name = $name;
                        $this->length = $length;
                        $this->manufacturer = $manufacturer;
                    }

                    abstract public function startEngine();

                    public function getInfo()
                    {
                        return "Name: {$this->name}, Length: {$this->length} meters, Manufacturer: {$this->manufacturer}";
                    }
                }

                //Create Class MotorBoat extend ship class

                class MotorBoat extends Ship
                {
                    private $engineType;

                    public function __construct($name, $length, $manufacturer, $engineType)
                    {
                        parent::__construct($name, $length, $manufacturer);
                        $this->engineType = $engineType;
                    }

                    public function startEngine()
                    {
                        return "Starting the {$this->engineType} engine of the motor boat.";
                    }
                }


                //Create Class Sailboat

                class Sailboat extends Ship
                {
                    private $sailCount;

                    public function __construct($name, $length, $manufacturer, $sailCount)
                    {
                        parent::__construct($name, $length, $manufacturer);
                        $this->sailCount = $sailCount;
                    }

                    public function startEngine()
                    {
                        return "Sailboats do not have engines.";
                    }

                    public function getSailCount()
                    {
                        return $this->sailCount;
                    }
                }

                // Create Class Yacht

                class Yacht extends Ship
                {
                    private $luxuryFeatures;

                    public function __construct($name, $length, $manufacturer, $luxuryFeatures)
                    {
                        parent::__construct($name, $length, $manufacturer);
                        $this->luxuryFeatures = $luxuryFeatures;
                    }

                    public function startEngine()
                    {
                        return "Starting the yacht's engine.";
                    }

                    public function getLuxuryFeatures()
                    {
                        return $this->luxuryFeatures;
                    }
                }


                    
                </textarea>

                <div class="links">
                    <a href="{{ url('/test/one') }}">Test 1</a>
                    <a href="{{ url('/test/two') }}">Test 2</a>
                    <a href="{{ url('/test/three') }}">Test 3</a>
                    <a href="{{ url('/test/four') }}">Test 4</a>
                    <a href="{{ url('/mini-project') }}">Mini Project</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </body>
</html>
