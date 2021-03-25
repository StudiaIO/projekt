package com.hotelbook.springboothotel;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.context.event.ApplicationReadyEvent;
import org.springframework.context.event.EventListener;

@SpringBootApplication
public class SpringboothotelApplication {
    @Autowired
    private UserMongoRepository userMongoRepository;
    public static void main(String[] args) {
        SpringApplication.run(SpringboothotelApplication.class, args);
    }

    @EventListener(ApplicationReadyEvent.class)
    public void afterTheStart(){
        user User = new user();
        User.setLast_name("Ziomalandia");
       // userMongoRepository.save(user);
        userMongoRepository.findAll().forEach(System.out::println);
    }
}
