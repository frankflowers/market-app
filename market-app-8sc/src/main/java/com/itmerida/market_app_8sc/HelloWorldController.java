package com.itmerida.market_app_8sc;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/api/hello")
public class HelloWorldController {

    @GetMapping("/saludar")
    public String saludar() {
        return "Hola mundo!";
    }
} 