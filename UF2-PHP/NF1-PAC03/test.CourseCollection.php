<?php
require_once('class.collection.php');

abstract class AbstractFileSystemElement
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

class File extends AbstractFileSystemElement
{
    public function __construct($name)
    {
        parent::setName($name);
    }
}

class Folder extends AbstractFileSystemElement
{
    private $files = [];

    public function __construct($name)
    {
        parent::setName($name);
    }

    public function add(AbstractFileSystemElement $file)
    {
        $this->files[] = $file;
    }

    public function getContent()
    {
        return count($this->files) > 0;
    }

    public function getFiles()
    {
        $output = $this->getName() . "<br/>";
        if ($this->getContent()) {
            $output .= "<ul><li>Contenido de la carpeta es:</li><ul>";
            foreach ($this->files as $file) {
                if ($file instanceof Link) {
                    $output .= $file->listAttributes();
                } elseif ($file instanceof Folder) {
                    $output .= $file->getFiles();
                } else {
                    $output .= "<li>" . $file->getName() . "</li>";
                }
            }
            $output .= "</ul></ul>";
        }
        return $output;
    }

    public function __toString()
    {
        return $this->getFiles();
    }
}

class Link extends AbstractFileSystemElement
{
    private $isSoftLink;
    private $Linkto;

    public function __construct($name, $isSoftLink, $Linkto)
    {
        parent::setName($name);
        $this->isSoftLink = $isSoftLink;
        $this->Linkto = $Linkto;
    }

    public function getisSoftLink()
    {
        return $this->isSoftLink ? "SoftLink" : "HardLink";
    }

    public function Path()
    {
        if (is_object($this->Linkto)) {
            return $this->Linkto->getName();
        } else {
            return "No es un enlace";
        }
    }

    public function getLinkto()
    {
        return $this->Path();
    }

    public function allAttributes()
    {
        return [
            'Nombre' => $this->getName(),
            'Tipo' => $this->getisSoftLink(),
            'Linkto' => $this->getLinkto()
        ];
    }

    public function listAttributes()
    {
        $attributesLink = $this->allAttributes();
        $output = "Información del enlace:";
        $output .= "<ul>";
        foreach ($attributesLink as $key => $value) {
            $output .= "<li>$key: $value</li>";
        }
        $output .= "</ul>";
        return $output;
    }

    public function __toString()
    {
        return $this->listAttributes();
    }
}

// Create a Collection instance to store objects of AbstractFileSystemElement
$abstractElementsCollection = new Collection();

// Add instances of AbstractFileSystemElement to the collection
$abstractElementsCollection->addItem(new File("Archivo_Beita.jpg"));
$abstractElementsCollection->addItem(new File("Archivo_Nico.jpg"));
$abstractElementsCollection->addItem(new Folder("Carpeta_Beita"));
$abstractElementsCollection->addItem(new Folder("Carpeta_Dani"));
$abstractElementsCollection->addItem(new Folder("Carpeta_Jordi"));
$abstractElementsCollection->addItem(new Link("Enlace_Beita", 1, $abstractElementsCollection->getItem(2)));
$abstractElementsCollection->addItem(new Link("Enlace_Francesc", 0, $abstractElementsCollection->getItem(0)));
$abstractElementsCollection->addItem(new Link("Enlace_Roto", 1, "error"));

// ... Continue adding elements as needed

// Print the content of the entire collection
echo $abstractElementsCollection;
?>
