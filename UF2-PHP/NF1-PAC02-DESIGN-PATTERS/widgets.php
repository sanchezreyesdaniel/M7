<?php

interface Observer{
    public function update(Observable $subject);
}



abstract class Widget implements Observer{
    
    protected $internalData = array();

    abstract public function draw();

    public function update(Observable $subject){
        $this->internalData = $subject->getData();
    }

}

class BasicWidget extends Widget {

    public function draw() {
        $html= '<!DOCTYPE html>
        <html lang="en">
        
        <head>
          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          <link rel="stylesheet" href="styles.css" />
        </head>
        
        <body>
          <section class="dropdown-menu" id="dropdown-menu">
            <button onclick="handleDropdownClicked(event)">
              <span class="material-symbols-outlined"> account_circle </span>
              Opciones
              <span id="dropdown-icon" class="chevron material-symbols-outlined"> expand_more </span>
            </button>
            <section class="dropdown-menu__labels">
              <div id="primary-menu" class="primary-menu">
                <div class="primary-menu__labels">';
                  
        $numFilas = count($this->internalData[0]); // numero de filas
        for ($i = 0; $i < $numFilas; $i++) {
            $menu = $this->internalData[0];

            $html .= '<button onclick="handleMenuLabelClicked(\'store\')">// solo me salen los 3 primeros
                    <span class="material-symbols-outlined"> store </span>
                    ' . $menu[$i] . '
                    <span class="chevron material-symbols-outlined">
                      chevron_right
                    </span>
                  </button>';
        }
        
        $html .= '</div>
                <section id="store" class="secondary-menu__labels" onclick="handleMenuLabelClicked()">
                  <button>
                    <span class="material-symbols-outlined"> shopping_cart </span>
                    Cart
                  </button>
                  <button>
                    <span class="material-symbols-outlined"> payment </span>
                    Manage Payment
                  </button>
                  <button>
                    <span class="material-symbols-outlined"> local_shipping </span>
                    Track Shipping
                  </button>
                </section>
                <section id="manage-settings" class="secondary-menu__labels" onclick="handleMenuLabelClicked()">
                  <button>
                    <span class="material-symbols-outlined"> shield_lock </span>
                    Change Password
                  </button>
                  <button>
                    <span class="material-symbols-outlined"> notifications </span>
                    Notifications
                  </button>
                  <button>
                    <span class="material-symbols-outlined"> contact_support </span>
                    Contact Support
                  </button>
                </section>
              </div>
            </section>
          </section>
          <script type="text/javascript" src="main.js"></script>
        </body>
        
        </html>';

        echo $html;
    }
}




// // class MenuWidget extends Widget{

// //     public function draw(){

// //         $html = "<ul>";
// //         // $html.= "<tr><td colspan=3 bgcolor=#cccccc>";
// //         // $html.= "<b>Instrument Info</b></td></tr>";

// //         $numFilas = count($this->internalData[0]); // numero de filas

// //         for($i=0; $i<$numFilas;$i++){
// //             $elementos = $this->internalData[0];
    
// //             $html.= "<li>".$elementos[$i] ."</li>";

// //         }

// //         $html.= "</ul>";

// //         echo $html;
// //     }

// // }


// class FancyWidget extends Widget{

//     public function draw(){

//         $html = "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>";
//         $html.= "<tr><td colspan=3 bgcolor=#cccccc>";
//         $html.= "<b><span class=blue>Our Latest Prices</span></b></td></tr>";
//         $html.= "<tr><th>instrument</th><th>price</th><th>date issued</th></tr>";

//         $numFilas = count($this->internalData[0]); // numero de filas

//         for($i=0; $i<$numFilas;$i++){
//             $instrumentos = $this->internalData[0];
//             $precios = $this->internalData[1];
//             $anyos = $this->internalData[2];

//             $html.= "<tr><td>$instrumentos[$i]</td><td>$precios[$i]</td><td>$anyos[$i]</td></tr>";

//         }

//         $html.= "</table>";

//         echo $html;
//     }

// }

?>