
# Flat Utility Application

This **Flat Utility Application** is designed to manage shared resources within a flatting/housemate environment, particularly useful for students like myself.

This project leverages virtualisation using Vagrant to create a modular, robust system that includes three virtual machines (VMs) to handle different aspects of the application. 

## Table of Contents

- [Flat Utility Application](#flat-utility-application)
  - [Table of Contents](#table-of-contents)
  - [Overview](#overview)
  - [VM Design](#vm-design)
    - [Technology Stack:](#technology-stack)
    - [VM Use \& Interaction:](#vm-use--interaction)
  - [Deployment and Setup Instructions](#deployment-and-setup-instructions)
    - [Prerequesites](#prerequesites)
    - [Cloning the Repository](#cloning-the-repository)
    - [Automatically starting the application with the VMs](#automatically-starting-the-application-with-the-vms)
    - [Accessing the Application](#accessing-the-application)
    - [Accessing the database](#accessing-the-database)
    - [Stopping the VMs](#stopping-the-vms)
  - [Modifying / Extending the Application](#modifying--extending-the-application)
    - [How to Extend:](#how-to-extend)
    - [Future Enhancements](#future-enhancements)
  - [Developed By](#developed-by)

## Overview

This application aims to manage tasks related to flat living, such as: 
 - **Shared Grocery List** where flatmates can add and delete items.
  
 - **Laundry Booking System** where flatmates can book laundry days.
  
 - **Power Cost Calculation System** that divides the power bill among flatmates based on the number of days they were present during the month.
  

This application uses three virtual machines (VMs) to separate functionalities, ensuring modularity and scalability. 

 - User Web Interface: Runs on one VM and allows users (flatmates)to interfact with the shared grocery list, laundry booking system and view their personal power costs for a chosen month.

 - Admin Web Interface: Runs on a separate VM, allowing aministrators to manage grocery lists, laundry bookings, and power cost calculations for the flat. 
  
  - Database storage VM: A dedicated VM hosts a MySQL database, which stores all data related to grocery items, laundry bookings, and power costs. 
  
## VM Design

### Technology Stack: 
 - Apache server to host the user and admin webpages.
 - PHP to handle server side logic for user and admin tasks. 
 - MySQL to handle relational data. 

### VM Use & Interaction:

The separation of VM's ensures each part of the application runs independently while relying on the database for consistency.

Both the user and admin VMs communicate with the database to read and write data. This ensures that all the data is centralised, making it easy to manage and scale. 

By separating the user-facing and admin-facing functionalities into different VMs, security is improved, and the system becomes modular. Admins can manage data without affecting user access, and users can interact with the app without seeing admin controls. 

Each VM handling a specific task makes it easier to maintain, debug and scale. As the app grows, it's easy to scale a dedicated area without overloading the entire system. Separating components of the system in such a way reduces the attack surface. 

## Deployment and Setup Instructions

### Prerequesites
1. Git: Ensure git is installed to clone the repository
  
     - You can check if Git is installed by running: 

            git --version

2. Vagrant: Download and install Vagrant here.

    - Vagrant is used to automatically create and manage virtual machines.

3. VirtualBox: Download and install Virtualbox here. 
    - Virtualbox is the hypervisor that Vagrant uses to create and manage the virtual machines. 

### Cloning the Repository
1. Open a terminal and clone the repository to your local machine using the following command: 

        git clone https://github.com/Kiwirish/Cloud-Flat-Utility-App.git
2. Navigate into the cloned repositories directory:

        cd <Your Repository Folder>

### Automatically starting the application with the VMs

1. Start the VMs with the following command:
   
        vagrant up

This will automatically create and provision the three VMs: 
 - webserver (User-facing interface)
 - admin-webserver (Admin-facing interface)
 - dbserver (Database storage)
  
Vagrant will download the necessary base boxes if not already present, and provision them using the provided shell scripts.
2. Check status: Verify all VMs are up and running with: 
   
        vagrant status 

### Accessing the Application
Once the VMs are up, you can access the different parts of the application: 

- User Interface: 
  
  - Visit http://localhost:8080 in your browser.

- Admin Interface: 
  
  - Visit http://localhost:8081 in your browser.
  
### Accessing the database
You can directly connect to the MySQL database on the dbserver VM via SSH: 

        vagrant ssh dbserver
        mysql -u webuser -p

The MySQL credentials (user: *webuser*, password: *insecure_db_pw*) are predefined in the provisioning script.

### Stopping the VMs 

        vagrant destroy


## Modifying / Extending the Application

Developers can extend the application by adding new PHP scripts for user and admin actions. Each new feature added should be tied to a VM's respective responsibility:

 - User VM: General flatmate tasks.
 - Admin VM: Data management.
 - Database VM: Storage and retrieval of relational data.
  
### How to Extend:

 - Database Modifications: Any schema changes should be made on the *dbserver* VM. You can modify the *setup-database.sql* file or create new provisioning scripts to ensure changes are reflected during VM provisioning.

 - Web Interface Changes: You can modify or add PHP and CSS files in the *www* (user) and *adminwww* (admin) directories for changes to the UI or business logic.

### Future Enhancements
The project is designed with future extensibility in mind. Potential new features for my development personally include:

 - FIFA Leaderboard: Track flatmates' FIFA game scores.
 - Shared Calendar: A booking system for shared spaces or other utilities.
 - Chat Room: A chat interface for flatmate communication.
  

---

## Developed By

**Blake Leahy**


- [GitHub](https://github.com/Kiwirish)
- [Portfolio](https://blakeleahy.tech)