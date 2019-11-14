package com.devweb.rh.controller;

import com.devweb.rh.model.Employe;
import com.devweb.rh.repository.EmployeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@CrossOrigin
@RequestMapping(value = "/employe")
public class EmployeController {

    @Autowired
    private EmployeRepository employeRepository;

    @GetMapping(value = "/liste")
    @PreAuthorize("hasAnyAuthority('ROLE_USER')")
    public List<Employe> Liste() {
        return employeRepository.findAll();
    }
}
