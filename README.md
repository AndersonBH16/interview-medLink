# About me:
- Hi MedLink Team, my name is **Anderson Blas**, I'm from Peru. I already finished with these exercises sucesfully!

- To give a look the solution, please give a look the follow files: `README.md` and `SUMMARY_EX1.md` respectively


See you soon!

# Summary: 

## Setup Environment

### Observations
- The exercises were developed with PHP v8.3
- You can give a look **Dockerfile** and **docker-compose.yaml** files and setup this app using it.

### Setup Steps
1. Clone the repository:
   ```sh
   git clone https://github.com/AndersonBH16/interview-medLink
   cd interview/medLink
   ```

2. Using dockers (Optional)
    - Create and run containers: (it may take some minutes to configure all environment)
         ```sh
         docker-compose up -d --build
         ```
    - Show containers
       ```sh
       docker ps
       ```
    - Access containers:
         ```sh
         docker exec -it medlink-app bash
         ```

    - if you need remove the containers created, run: (Optional)
       ```sh
        docker-compose down
      ```

## Exercise 1: Find the point

### Summary view

- You cand fint the code on `src/challenge-01/index.php`
- You are given an **array with 2 strings**. Each string contains a **list of comma-separated numbers**, and both are **sorted in ascending order**. 
 

- Objectives

    - Compare both lists
    - Find the numbers that appear in both lists.
    - Return those numbers as a single comma-separated string, already sorted.
    - If there are no common numbers, return the string "false".

### Test this exercise

1. Only go to browser and go to
   ```sh
   http://localhost:8066/challenge-01/index.php
   ```

## Exercise 2: Find the Smallest Substring Containing All Characters

### What should we do?

In this challenge, you are given an array with two strings: the first is a longer string called **N**, 
and the second is a shorter string called **K**, which contains certain characters. 
Your goal is to find the **smallest possible substring inside N** that contains **all 
the characters in K**, regardless of their order.

- You cand fint the code on `src/challenge-02/index.php`

### Test this exercise

1. Only go to browser and go to
   ```sh
   http://localhost:8066/challenge-01/index.php


## Exercise 3: Gilded Rose

### What should we do?

Improve the current app using POOO and good practices. I added some Interface and classes improving code structure according to requirements.
Finally you must run the test to verify if everything is working fine

- You cand fint the code on `src/challenge-03/`

### Running tests

1. On your terminal, you must go the container
   ```sh
   docker exec -it medlink bash

2. Inside your container, go to directory exercise and run composer install
   ```sh
   cd src/challenge-03
   composer install

3. Finally, you need run
   ```sh
   ./bin/kahlan
