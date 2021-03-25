package com.hotelbook.springboothotel;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;
@RestController
public class HomeCotroller {

    @GetMapping("/")
    public String homePage()
    {
        return "Witaj w hotelu marmurr";
    }

}
