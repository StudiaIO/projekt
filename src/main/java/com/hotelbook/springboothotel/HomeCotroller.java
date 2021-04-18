package com.hotelbook.springboothotel;

import com.hotelbook.springboothotel.objects.User;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

@RestController

public class HomeCotroller {
    private static final Logger log = LoggerFactory.getLogger(HomeCotroller.class);

    @GetMapping("/")
    public String homePage()
    {
        return "Witaj w hotelu marmurr";
    }
    @GetMapping("/register" )


    public String register(@ModelAttribute User user, Model model) {
        model.addAttribute("user", user);
        return "register";
    }
    @PostMapping("/register")
    public void save(User user){
            log.info(">> user : {}", user.toString());
        }
    }

