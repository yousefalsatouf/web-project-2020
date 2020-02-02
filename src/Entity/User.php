<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"internaute" = "Internaute", "prestataire" = "Prestataire", "user" = "User"})
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookAccessToken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $adresseNbr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $adresseRue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $banni;

    /**
    * @ORM\Column(type="boolean", nullable=true)
    */
    protected $inscriptionConf;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $inscription;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $nbEssaisInfructueux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $typeUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CodePostal")
     */
    protected $codePostal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Localite")
     */
    protected $localite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commune")
     */
    protected $commune;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * @param mixed $facebookID
     */
    public function setFacebookID($facebookID): void
    {
        $this->facebookID = $facebookID;
    }

    /**
     * @return mixed
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * @param mixed $facebookAccessToken
     */
    public function setFacebookAccessToken($facebookAccessToken): void
    {
        $this->facebookAccessToken = $facebookAccessToken;
    }

    function loadUserByUsernameOrEmail($usernameOrEmail)
    {
        return $this->createQuery(
            'SELECT u
             FROM App\Entity\User u
             WHERE u.username = :query
             OR u.email = :query'
        )
        ->setParameter('query', $usernameOrEmail)
        ->getQuery()
        ->getOneOrNullResult();
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

     public function getAdresseNbr(): ?string
    {
        return $this->adresseNbr;
    }

    public function setAdresseNbr(?string $adresseNbr): self
    {
        $this->adresseNbr = $adresseNbr;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(?string $adresseRue): self
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(?bool $banni): self
    {
        $this->banni = $banni;

        return $this;
    }

    public function getInscriptionConf(): ?bool
    {
        return $this->inscriptionConf;
    }

    public function setInscriptionConf(?bool $inscriptionConf): self
    {
        $this->inscriptionConf = $inscriptionConf;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(?\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getNbEssaisInfructueux(): ?int
    {
        return $this->nbEssaisInfructueux;
    }

    public function setNbEssaisInfructueux(?int $nbEssaisInfructueux): self
    {
        $this->nbEssaisInfructueux = $nbEssaisInfructueux;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?string $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getCodePostal(): ?CodePostal
    {
        return $this->codePostal;
    }

    public function setCodePostal(?CodePostal $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getLocalite(): ?Localite
    {
        return $this->localite;
    }

    public function setLocalite(?Localite $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

}
