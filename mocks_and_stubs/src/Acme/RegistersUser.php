<?php

namespace Acme;

class RegistersUser
{
	protected $repository;

    public function __construct(UserRepository $repository, Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->repository = $repository;
    }

    public function register(array $user)
    {
        $this->repository->create($user);
        
        $this->mailer->sendWelcome($user['email']);
    }
}
