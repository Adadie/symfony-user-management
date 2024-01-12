<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 

class User
{
    private static $lastId = 0;

    public $id;
    public $name;
    public $email;
    public $age;

    public function __construct($name, $email, $age)
    {
        self::$lastId++;
        $this->id = self::$lastId;
        $this->name = $name;
        $this->email = $email;  
        $this->age = $age;
    }
}
class UserController extends AbstractController
{
    #[Route('/users', name: 'app_user', methods: ['GET'])]
    public function index(): Response
    {

        $student = new User('john_doe', 'john.doe@example.com', 21);
        $student1 = new User('Adadie', 'adadie@example.com', 67);
        $student2 = new User('Chris', 'chris@example.com', 13);
        $students = [$student, $student1, $student2];

        return $this->render('index.html.twig', ['students' => $students]);
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/UserController.php',
        // ]);
    }
}
