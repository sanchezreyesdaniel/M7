<?php

// Clase base para elementos del sistema de archivos
class FileSystemElement {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

// Clase para archivos
class File extends FileSystemElement {
    private $content;

    public function __construct($name, $content) {
        parent::__construct($name);
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }
}

// Clase para enlaces suaves
class SoftLink extends FileSystemElement {
    private $target;

    public function __construct($name, $target) {
        parent::__construct($name);
        $this->target = $target;
    }

    public function getTarget() {
        return $this->target;
    }
}

// Clase para enlaces duros
class HardLink extends FileSystemElement {
    private $target;

    public function __construct($name, $target) {
        parent::__construct($name);
        $this->target = $target;
    }

    public function getTarget() {
        return $this->target;
    }
}

// Clase para carpetas
class Folder extends FileSystemElement {
    private $contents;

    public function __construct($name) {
        parent::__construct($name);
        $this->contents = [];
    }

    public function addElement(FileSystemElement $element) {
        $this->contents[] = $element;
    }

    public function getContents() {
        return $this->contents;
    }
}

// Ejemplo de uso
$file1 = new File('archivo1.txt', 'Contenido del archivo 1');
$file2 = new File('archivo2.txt', 'Contenido del archivo 2');
$file3 = new File('archivo3.txt', 'Contenido del archivo 3');

$softLink1 = new SoftLink('soft-link1.txt', $file1);
$softLink2 = new SoftLink('soft-link2.txt', $file2);

$hardLink1 = new HardLink('hard-link1.txt', $file1);
$hardLink2 = new HardLink('hard-link2.txt', $file3);

$folder = new Folder('carpeta_principal');
$folder->addElement($file1);
$folder->addElement($file2);
$folder->addElement($softLink1);
$folder->addElement($hardLink1);

$subfolder = new Folder('subcarpeta');
$subfolder->addElement($file3);
$subfolder->addElement($softLink2);
$subfolder->addElement($hardLink2);

$folder->addElement($subfolder);

// Puedes acceder a los elementos dentro de la carpeta así:
$contents = $folder->getContents();

// Puedes imprimir información sobre los elementos:
foreach ($contents as $element) {
    if ($element instanceof File) {
        echo "Archivo: {$element->getName()} - Contenido: {$element->getContent()}\n";
    } elseif ($element instanceof SoftLink) {
        echo "Enlace suave: {$element->getName()} - Destino: {$element->getTarget()->getName()}\n";
    } elseif ($element instanceof HardLink) {
        echo "Enlace duro: {$element->getName()} - Destino: {$element->getTarget()->getName()}\n";
    } elseif ($element instanceof Folder) {
        echo "Carpeta: {$element->getName()}\n";
        // Puedes acceder a los elementos dentro de la subcarpeta así:
        
        $subContents = $element->getContents();
        foreach ($subContents as $subElement) {
            if ($subElement instanceof File) {
                echo "  Archivo: {$subElement->getName()} - Contenido: {$subElement->getContent()}\n";
            } elseif ($subElement instanceof SoftLink) {
                echo "  Enlace suave: {$subElement->getName()} - Destino: {$subElement->getTarget()->getName()}\n";
            } elseif ($subElement instanceof HardLink) {
                echo "  Enlace duro: {$subElement->getName()} - Destino: {$subElement->getTarget()->getName()}\n";
            }
            echo "<br>";
        }
        
    }
    echo "<br>";
}
?>
