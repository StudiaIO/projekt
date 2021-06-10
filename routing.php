<?php

    use core\App;
    use core\Utils;

    App::getRouter()->setDefaultRoute('showMainPage'); #default action
    App::getRouter()->setLoginRoute('login');

    Utils::addRoute('showMainPage', 'MainControl');
    Utils::addRoute('login', 'LoginControl');
    Utils::addRoute('register', 'RegisterControl');
    Utils::addRoute('logout', 'LoginControl');
 
  
  

   
    Utils::addRoute('addPlace', 'AddPlaceControl', ['admin', 'moderator' ]);
   
   
    Utils::addRoute('userEdit', 'UserEditControl', ['admin']);
 Utils::addRoute('manageUsers', 'UserManagerControl', ['admin']);
 Utils::addRoute('managePanel', 'PanelControl', ['admin', 'moderator', 'user']);
    Utils::addRoute('panel', 'PanelControl', ['admin', 'moderator', 'user']);
 Utils::addRoute('panelBooking', 'PanelBookingControl', ['admin', 'moderator', 'user']);  
 Utils::addRoute('hotel', 'BookingControl', ['admin', 'moderator', 'user']);  

    Utils::addRoute('managePlaces', 'RoomManagerControl', ['admin', 'moderator']);
    Utils::addRoute('placeEdit', 'RoomEditControl', ['admin', 'moderator']);
    Utils::addRoute('usersBooking', 'UsersBookingControl', ['admin', 'moderator','user']);


    //Utils::addRoute('action_name', 'controller_class_name');