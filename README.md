# Workplace-Inspection-Portal
A powerful web portal for managing workplace inspections

## Product Overview 

### Introduction 

The University of Queensland is composed of multiple large campuses. As a result, it can be very difficult for occupational health and safety (OHS) staff to effectively deal with security and safety problems utilising workplace inspections. This product aims to improve the efficiency of managing workplace inspections. It will contain a number of supportive functions to help achieve this goal, such as inspection scheduling/rescheduling and creating reports. 

### Intended Users

The finished product will be utilised primarily by safety managers and coordinators. Managers are in charge of arranging inspections, whereas the coordinators complete them and write related documentation. Because of the different use situations (mobile vs stationary computers) the website will be adjusted to suit mobile screens. 

### Solutions

Our product is an online platform to help OHS staff easily accomplish their tasks. Such as easily creating inspections with sufficient information, reassigning team members or rescheduling to a different day.There are several functions that were agreed upon by both the client and the team to meet the clients’ requirements. 


## Main pages

The code base is made up of nine parts; 

The dashboard, coordinator Inspection, manager inspection, report, CAP, contact, setting and database. 

The inspection, report and CAP pages contain most of the core functionality. 

The manager inspection page is where inspection can be scheduled using some present questions. It also lists all upcoming inspections, which ensures that users are aware of current developments and can edit details as needed.
When the inspection is created or edited, information is sent to the database using php and relevant attributes will be created or modified there including address, people assigned, description, due date and so on. 

The CAP (corrective action plan) page allows users to create cap reports. Data will sent using php when a user makes a cap, including the associated inspection project, due date, status, creator, and priority choice to the database and initiate the item there. 

In addition, a specified report can be generated containing completed CAP reports. This data will be displayed with javascript and acquire the information from the database using PHP. 
