<!-- 1. Input Validation


Input Validation is the process of checking whether the data entered by the user is valid before processing it.

As a Developer, Never trust user input because users can:

Leave fields empty.
Enter incorrect values.
Enter letters where numbers are expected.
Submit malicious code.
Try to break the application.



Types of Validation

1. Input Validation
    a. Empty Validation // Checks if the user entered any value. // if(empty($name))
    b. Data Type Validation
    c. Range Validation
    d. Format Validation

2. isset() // isset($variable)

isset() checks whether a variable exists and is not NULL.

It returns:
true → Variable exists.
false → Variable does not exist or is NULL.

3. empty() // empty() checks whether a variable has an empty value.

It returns true for:

""
0
"0"
NULL
false
Empty array []

4. Required Field Validation // Many forms have some mandatory fields.

Registration Form
Name ✔
Email ✔
Password ✔

Optional Fields
Address
Website


5. trim() // Users sometimes enter unnecessary spaces before or after the actual value.

Example : "    Rahul     "
- trim() removes spaces from the beginning and end of a string.


6. htmlspecialchars()

This function converts special HTML characters into HTML entities.
It helps prevent Cross-Site Scripting (XSS) attacks.

<script>alert("Hack")</script>

Without htmlspecialchars(), the browser may execute the script.
With htmlspecialchars(), it is displayed safely as plain text.

Example input : <script>alert("Hello")</script>


7. strip_tags() // This function removes HTML and PHP tags from a string.

Example input : <b>Hello</b> <i>World</i>


8. Sticky Forms (Form Repopulation)

Theory
A Sticky Form remembers the values entered by the user after the form is submitted.
 -->
