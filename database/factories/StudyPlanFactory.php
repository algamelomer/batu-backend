<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyPlan>
 */
class StudyPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studyPlans = [
            [
                'name' => 'Intro. to Cyber Security',
                'description' => '\"Intro to Cyber Security\" provides foundational knowledge and skills for protecting digital systems from cyber threats. Topics include threat analysis, risk assessment, encryption, network security, incident response, and ethics. It\'s essential for anyone entering the cybersecurity field or seeking to enhance their digital security expertise.',
                'Lecturer_id' => 3,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '1hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'IT Essentials',
                'description' => '\"IT Essentials\" is a course focused on foundational knowledge in Information Technology (IT). It covers essential topics such as computer hardware, software, networking, security, and troubleshooting. This course is ideal for individuals looking to start a career in IT or for those who want to build a solid understanding of IT fundamentals.',
                'Lecturer_id' => 1,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Technical English 1',
                'description' => '\"Technical English 1\" is a course designed to develop language skills specifically for the field of technology and engineering. It focuses on enhancing vocabulary related to technical concepts, improving reading comprehension of technical documents and manuals, and refining writing skills for technical reports and documentation. This course is ideal for non-native English speakers working or studying in technical fields who wish to communicate more effectively in English within their professional environments.',
                'Lecturer_id' => 2,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Mathematics 1',
                'description' => '\"Mathematics 1\" typically refers to an introductory course covering foundational concepts in mathematics. This course often includes topics such as arithmetic (operations with numbers), algebra (equations, inequalities, and functions), geometry (shapes, angles, and areas), and possibly introductory concepts in calculus or statistics, depending on the curriculum. Mathematics 1 serves as a fundamental building block for more advanced mathematical studies and is often a prerequisite for higher-level math courses.',
                'Lecturer_id' => 7,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'physics',
                'description' => 'Physics is the scientific study of matter, energy, and the fundamental forces that govern the behavior of the universe. It explores a wide range of phenomena, from the smallest subatomic particles to the largest galaxies. Physics seeks to understand the fundamental principles underlying natural phenomena and uses mathematical models to describe and predict the behavior of physical systems. Key topics in physics include mechanics (motion and forces), thermodynamics (heat and energy), electromagnetism (electricity and magnetism), optics (light), quantum mechanics (behavior of particles on a subatomic scale), and relativity (gravity and spacetime). Physics plays a crucial role in shaping our understanding of the natural world and has numerous applications in technology, engineering, and other scientific disciplines.',
                'Lecturer_id' => 9,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Programming Essentials in Python',
                'description' => 'Programming Essentials in Python is a course designed to teach fundamental programming concepts using the Python programming language. Participants will learn key programming principles such as variables, data types, control structures (loops and conditionals), functions, and object-oriented programming. The course typically covers practical exercises and projects to reinforce learning and develop problem-solving skills. Python is chosen as the programming language due to its simplicity, readability, and versatility, making it an excellent choice for beginners and professionals alike. By the end of the course, students should have a solid foundation in programming and be able to write basic Python programs to solve various computational tasks.',
                'Lecturer_id' => 6,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Programming Essentials in C',
                'description' => 'Programming Essentials in C is a course aimed at teaching fundamental programming concepts using the C programming language. Participants will learn key concepts such as variables, data types, control structures (loops and conditionals), functions, and pointers. The course typically includes practical exercises and projects to reinforce learning and develop problem-solving skills. C is chosen as the programming language due to its efficiency, close-to-the-hardware approach, and widespread use in system programming, embedded systems, and low-level development. By the end of the course, students should have a strong foundation in programming with C and be able to write basic C programs to solve various computational tasks.',
                'Lecturer_id' => 2,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Cyber Security Essentials',
                'description' => 'is a course designed to provide foundational knowledge and skills in the field of cybersecurity. Participants will learn essential concepts, principles, and practices to protect digital systems, networks, and data from cyber threats. The course typically covers topics such as threat landscape analysis, risk assessment, security policies and procedures, encryption techniques, network security principles, incident response, and ethical considerations in cybersecurity. Practical exercises and case studies may be included to reinforce learning and develop hands-on skills. This course is ideal for individuals looking to enter the cybersecurity field or for professionals seeking to enhance their knowledge and expertise in safeguarding digital assets.',
                'Lecturer_id' => 3,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Intro to IoT& Connecting Things',
                'description' => '\"Introduction to IoT & Connecting Things\" is a course designed to provide an overview of the Internet of Things (IoT) and how various devices can be connected to form a networked ecosystem. Participants will explore the fundamentals of IoT, including concepts such as sensors, actuators, communication protocols, data management, and cloud computing. The course typically covers the architecture of IoT systems, the role of edge computing, security and privacy considerations, and real-world applications across different industries. Practical demonstrations and hands-on projects may be included to help participants gain a deeper understanding of IoT technologies and their implementation. This course is suitable for individuals interested in exploring the potential of IoT or professionals seeking to incorporate IoT solutions into their work.',
                'Lecturer_id' => 1,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'MS office',
                'description' => '\"MS Office\" typically refers to Microsoft Office, a suite of productivity software developed by Microsoft. It includes a variety of applications commonly used in office settings and beyond. The core applications of Microsoft Office typically include:\r\n\r\nMicrosoft Word: A word processing program used for creating and editing documents.\r\nMicrosoft Excel: A spreadsheet program used for data analysis, calculation, and visualization.\r\nMicrosoft PowerPoint: A presentation program used for creating slideshows and presentations.',
                'Lecturer_id' => 8,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '2hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Technical English II',
                'description' => '\"Technical English II\" is an advanced course aimed at further developing language skills specifically tailored for the field of technology and engineering. Building upon the foundation established in Technical English I, this course delves deeper into specialized vocabulary, advanced reading comprehension of technical documents, and sophisticated writing skills for technical reports, documentation, and presentations. Additionally, it may cover topics such as professional communication in international contexts, intercultural communication, and academic writing conventions. This course is ideal for non-native English speakers working or studying in technical fields who wish to refine their language proficiency to communicate effectively and confidently in professional environments.',
                'Lecturer_id' => 2,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Mathematics II',
                'description' => '\"Mathematics II\" typically follows an introductory mathematics course and is designed to deepen students\' understanding of mathematical concepts and techniques. This course often covers more advanced topics in algebra, geometry, trigonometry, calculus, and statistics. Some specific topics may include:\r\n\r\nAdvanced algebraic concepts such as quadratic equations, exponential functions, logarithmic functions, and polynomial functions.\r\nFurther exploration of geometry, including properties of shapes, geometric proofs, and transformations.\r\nTrigonometric functions, identities, and applications.\r\nTechniques of calculus, including differentiation, integration, and applications to real-world problems.\r\nProbability and statistics, covering concepts such as probability distributions, hypothesis testing, and regression analysis.\r\nMathematics II typically involves more complex problem-solving and critical thinking exercises, as well as applications of mathematical concepts to various fields such as science, engineering, and economics.',
                'Lecturer_id' => 7,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Linux Essentials',
                'description' => '"Linux Essentials" is a course aimed at providing fundamental knowledge and skills in using the Linux operating system. Participants will learn essential concepts such as navigating the Linux file system, managing files and directories, using basic command-line utilities, understanding user permissions and ownership, and performing system administration tasks. The course typically covers an introduction to Linux distributions, the command-line interface, shell scripting basics, and essential system administration tasks such as user management and package installation. Practical exercises and hands-on labs are often included to reinforce learning and develop proficiency in using Linux. This course is ideal for beginners or individuals transitioning to Linux from other operating systems who want to gain a solid understanding of Linux fundamentals.',
                'Lecturer_id' => 5,
                'academic_year' => '2 year',
                'semester' => '3',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Programming Essentials in  C++',
                'description' => '"Programming Essentials in C++" is a course designed to teach fundamental programming concepts using the C++ programming language. Participants will learn key programming principles such as variables, data types, control structures (loops and conditionals), functions, classes, and object-oriented programming (OOP) concepts like inheritance, polymorphism, and encapsulation. The course typically covers practical exercises and projects to reinforce learning and develop problem-solving skills. C++ is chosen as the programming language due to its versatility, efficiency, and widespread use in various domains such as system programming, game development, and high-performance applications. By the end of the course, students should have a strong foundation in programming with C++ and be able to write basic to intermediate level programs to solve various computational tasks.',
                'Lecturer_id' => 2,
                'academic_year' => '2 year',
                'semester' => '3',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'id' => 48,
                'name' => 'Web Programming I',
                'description' => '"Web Programming I" is a course focused on introducing fundamental concepts and technologies used in web development. Participants will learn key languages and technologies such as HTML (Hypertext Markup Language), CSS (Cascading Style Sheets), and JavaScript, which are essential for building interactive and visually appealing websites. The course typically covers topics such as:

        HTML: Creating the structure and content of web pages.
        CSS: Styling web pages to enhance their appearance and layout.
        JavaScript: Adding interactivity and dynamic behavior to web pages.
        Introduction to web development tools and frameworks.
        Best practices for designing and developing user-friendly websites.

        Practical exercises, projects, and hands-on activities are often included to reinforce learning and provide practical experience in building web applications. This course serves as a foundation for individuals interested in pursuing further studies or careers in web development.',
                'Lecturer_id' => 3,
                'academic_year' => '2 year',
                'semester' => '3',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'id' => 49,
                'name' => 'Introduction to DB',
                'description' => '"Introduction to Databases" is a course aimed at providing fundamental knowledge and skills in the field of database management. Participants will learn essential concepts related to storing, organizing, and retrieving data efficiently in a structured manner. The course typically covers topics such as:

        Introduction to databases and database management systems (DBMS).
        Relational database concepts, including tables, rows, columns, and relationships.
        SQL (Structured Query Language) for querying and manipulating data in databases.
        Database design principles, normalization, and data modeling.
        Introduction to NoSQL databases and other types of database systems.
        Basic database administration tasks, such as backup and recovery.

        Practical exercises, hands-on labs, and projects are often included to reinforce learning and provide real-world experience in working with databases. This course is ideal for beginners or individuals looking to gain a foundational understanding of database management concepts and technologies.',
                'Lecturer_id' => 2,
                'academic_year' => '2 year',
                'semester' => '3',
                'credits' => '2hrs',
                'user_id' => 1,
                'department_id' => 8,
            ], [
                'name' => 'Digital Engineering',
                'description' => '\"Digital Engineering\" is an interdisciplinary field that integrates principles and techniques from various engineering disciplines with digital technologies to design, simulate, analyze, and optimize complex systems and processes. This field encompasses a wide range of applications, including but not limited to:\r\n\r\nDigital Design: Using computer-aided design (CAD) software to create and simulate engineering designs for products, buildings, and infrastructure.\r\nSimulation and Modeling: Employing computer simulations and mathematical models to predict the behavior of systems and processes under different conditions.\r\nData Analytics: Utilizing data-driven approaches to extract insights and optimize performance in engineering systems.\r\nVirtual Prototyping: Creating virtual prototypes and simulations to test and validate designs before physical implementation.\r\nDigital Twins: Developing digital replicas of physical assets or systems to monitor, analyze, and optimize their performance in real-time.\r\nInternet of Things (IoT): Integrating sensors, actuators, and connectivity to enable smart and interconnected systems for monitoring, control, and optimization.\r\nAutomation and Robotics: Implementing automation and robotics solutions to streamline manufacturing processes, increase efficiency, and improve safety.\r\nArtificial Intelligence (AI): Applying AI and machine learning techniques to enhance decision-making, predictive analytics, and optimization in engineering applications.\r\nDigital Engineering plays a vital role in advancing innovation, efficiency, and sustainability across various industries, including manufacturing, construction, aerospace, automotive, healthcare, and energy. It requires a multidisciplinary skill set combining expertise in engineering principles, computer science, data analytics, and digital technologies.',
                'Lecturer_id' => 1,
                'academic_year' => '2',
                'semester' => '3',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Operating System',
                'description' => '\"Operating System\" (OS) is a software program that acts as an intermediary between computer hardware and user applications. It manages computer resources such as memory, processing units, storage devices, and input/output devices, and provides a platform for running applications and executing tasks.\r\n\r\nKey functions of an operating system include:\r\n\r\nProcess Management: Allocating system resources to processes, scheduling tasks, and managing process communication and synchronization.\r\nMemory Management: Managing system memory to optimize usage and allocation for running processes.\r\nFile System Management: Organizing and managing files and directories on storage devices, including file creation, deletion, and access control.\r\nDevice Management: Handling communication with input/output devices such as keyboards, displays, printers, and storage devices.\r\nSecurity and Protection: Enforcing security policies, controlling access to system resources, and protecting against unauthorized access and malicious activities.\r\nUser Interface: Providing a user interface for interacting with the computer system, which can range from command-line interfaces to graphical user interfaces (GUIs).\r\nNetworking: Supporting network communication and providing network services such as file sharing, printing, and internet access.\r\nExamples of popular operating systems include:\r\n\r\nMicrosoft Windows: A widely-used operating system for personal computers and servers developed by Microsoft.\r\nLinux: A free and open-source operating system kernel that is commonly used in servers, embedded systems, and as the basis for various Linux distributions.\r\nmacOS: An operating system developed by Apple Inc. for its Macintosh computers.\r\nUnix: A family of multitasking, multi-user operating systems that have influenced the development of many other operating systems, including Linux and macOS.\r\nOperating systems play a critical role in enabling users to interact with computer hardware and software efficiently and effectively. They provide the foundation for running applications, managing resources, and ensuring the overall stability and security of computer systems.',
                'Lecturer_id' => 5,
                'academic_year' => '2',
                'semester' => '3',
                'credits' => '2hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Java Programming I',
                'description' => '\"Java Programming I\" is a course designed to introduce fundamental concepts and principles of programming using the Java programming language. Participants will learn key programming concepts such as variables, data types, control structures (loops and conditionals), functions (methods), classes, and object-oriented programming (OOP) principles like inheritance, polymorphism, and encapsulation.\r\n\r\nThe course typically covers topics such as:\r\n\r\nIntroduction to Java programming language and its syntax.\r\nBasic data types and operators in Java.\r\nControl flow structures including if-else statements, loops (for, while, do-while), and switch statements.\r\nMethods and functions: defining, calling, and passing arguments.\r\nObject-oriented programming concepts: classes, objects, constructors, methods, inheritance, polymorphism, and encapsulation.\r\nArrays and collections: working with arrays, ArrayLists, and other collection classes.\r\nException handling: handling errors and exceptions in Java programs.\r\nIntroduction to basic input/output operations and file handling in Java.\r\nPractical exercises, coding assignments, and hands-on projects are often included to reinforce learning and provide practical experience in Java programming. This course serves as a foundation for individuals interested in pursuing further studies or careers in software development using Java.',
                'Lecturer_id' => 6,
                'academic_year' => '2',
                'semester' => '4',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Web Programming II',
                'description' => '\"Web Programming II\" is an advanced course that builds upon the foundational knowledge acquired in Web Programming I. It focuses on further developing skills in web development and exploring more advanced topics and technologies used in modern web applications.\r\n\r\nThe course typically covers topics such as:\r\n\r\nAdvanced HTML5 and CSS3 techniques for creating responsive and visually appealing web layouts.\r\nClient-side scripting languages such as JavaScript and libraries/frameworks like jQuery for dynamic web content and interactivity.\r\nServer-side scripting languages such as PHP, Python (Django/Flask), or Node.js for building dynamic and data-driven web applications.\r\nDatabase integration and interaction using SQL (Structured Query Language) and database management systems like MySQL, PostgreSQL, or MongoDB.\r\nWeb application security practices and techniques, including authentication, authorization, and protection against common vulnerabilities (e.g., Cross-Site Scripting, SQL Injection).\r\nRESTful APIs (Application Programming Interfaces) and AJAX (Asynchronous JavaScript and XML) for building interactive and efficient web applications.\r\nVersion control systems such as Git for managing and collaborating on web development projects.\r\nDeployment and hosting considerations for web applications, including cloud-based solutions and server configurations.',
                'Lecturer_id' => 3,
                'academic_year' => '2',
                'semester' => '4',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'CCNA R&S I',
                'description' => '\"CCNA R&S I\" refers to the first course in the Cisco Certified Network Associate Routing and Switching (CCNA R&S) certification track. This course focuses on building a strong foundation in networking fundamentals and covers topics related to Cisco networking technologies.\r\n\r\nKey topics typically covered in CCNA R&S I include:\r\n\r\nIntroduction to Networking: Understanding the basics of networking concepts, protocols, and models.\r\nEthernet LANs: Exploring Ethernet technologies, including Ethernet standards, cabling, and addressing.\r\nIPv4 Addressing: Learning about IPv4 addressing, subnetting, and addressing schemes.\r\nIPv6 Addressing: Introduction to IPv6 addressing and transition mechanisms from IPv4 to IPv6.\r\nNetwork Access: Configuring and managing network devices, such as switches and routers.\r\nIP Routing: Understanding routing concepts, including static and dynamic routing protocols.\r\nNetwork Security: Implementing basic security measures to protect network infrastructure.\r\nBasic Troubleshooting: Identifying and resolving common network issues using troubleshooting methodologies.\r\nCCNA R&S I typically combines theoretical concepts with practical hands-on labs using Cisco networking equipment or simulators. It provides students with the foundational knowledge and skills required to configure, troubleshoot, and manage small to medium-sized enterprise networks. This course is suitable for individuals aspiring to pursue a career in network administration or seeking to enhance their networking expertise.',
                'Lecturer_id' => 1,
                'academic_year' => '2',
                'semester' => '4',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Data Structure',
                'description' => '\"Data Structures\" is a foundational topic in computer science that focuses on organizing and managing data efficiently in computer memory. Data structures are essential for storing, retrieving, and manipulating data in various algorithms and applications. They play a critical role in optimizing the performance and scalability of computer programs.\r\n\r\nKey concepts covered in a Data Structures course typically include:\r\n\r\nArrays: Ordered collection of elements stored at contiguous memory locations.\r\nLinked Lists: Linear data structures where elements are stored in nodes with pointers to the next node.\r\nStacks: Last-In-First-Out (LIFO) data structures where elements are added and removed from the same end.\r\nQueues: First-In-First-Out (FIFO) data structures where elements are added at the rear and removed from the front.\r\nTrees: Hierarchical data structures consisting of nodes connected by edges, with a single root node at the top.\r\nGraphs: Non-linear data structures consisting of nodes (vertices) connected by edges.\r\nHash Tables: Data structures that map keys to values using a hash function to achieve constant-time average case complexity for key operations.',
                'Lecturer_id' => 5,
                'academic_year' => '2',
                'semester' => '4',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Database Programming',
                'description' => 'Database programming involves writing code to interact with databases, retrieve and manipulate data, and perform various operations such as querying, updating, and deleting records. It typically involves using programming languages and frameworks to communicate with a database management system (DBMS) and execute SQL (Structured Query Language) commands or database-specific APIs.',
                'Lecturer_id' => 2,
                'academic_year' => '2',
                'semester' => '4',
                'credits' => '2hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Capstone Design',
                'description' => '\"Capstone Design\" is a project based subject\r\nit is a project graduation for students who are going to leave on the 4th semester with',
                'Lecturer_id' => 1,
                'academic_year' => '2',
                'semester' => '4',
                'credits' => '2hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Braking systems',
                'description' => 'This course covers the principles and applications of braking systems in various mechanical systems. Topics include the fundamentals of braking technology, types of braking systems, components and their functions, braking performance analysis, and maintenance practices. Emphasis is placed on understanding the design, operation, and optimization of braking systems in automotive, railway, and industrial applications.',
                'Lecturer_id' => 11,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Thermal machines',
                'description' => 'This course explores the principles and operation of thermal machines, including engines, turbines, and refrigeration systems. Topics include thermodynamic cycles, energy conversion processes, heat transfer mechanisms, and performance analysis of thermal machines. Practical applications and case studies are used to illustrate concepts such as efficiency, power generation, and environmental impact.',
                'Lecturer_id' => 11,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Foundation workshops',
                'description' => 'Foundation workshops provide hands-on experience and practical training in basic engineering skills. Participants learn essential techniques such as machining, welding, fabrication, and assembly. Emphasis is placed on safety practices, tool selection, and equipment operation. Workshops may include projects to apply learned skills and reinforce understanding of engineering principles.',
                'Lecturer_id' => 11,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Removal, Install and overhaul Engine Assembles',
                'description' => 'This course provides training in the removal, installation, and overhaul of engine assemblies. Participants learn procedures for disassembling engines, inspecting components, identifying wear and damage, and performing necessary repairs or replacements. Emphasis is placed on following manufacturer specifications, maintaining quality standards, and ensuring proper assembly techniques.',
                'Lecturer_id' => 11,
                'academic_year' => '1',
                'semester' => '2',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
            [
                'name' => 'Thermodynamics and heat transfer',
                'description' => 'This course explores the principles of thermodynamics and heat transfer and their applications in engineering systems. Topics include the laws of thermodynamics, properties of pure substances, heat transfer mechanisms (conduction, convection, radiation), and thermal analysis techniques. Practical examples and case studies are used to illustrate concepts such as heat exchangers, thermal insulation, and energy conversion processes.',
                'Lecturer_id' => 11,
                'academic_year' => '1',
                'semester' => '1',
                'credits' => '3hrs',
                'user_id' => 1,
                'department_id' => 8,
            ],
        ];

        static $index = 0;
        $plan = $studyPlans[$index];
        $index = ($index + 1) % count($studyPlans);

        return [
            'name' => $plan['name'],
            'description' => $plan['description'],
            'academic_year' => $plan['academic_year'],
            'semester' => $plan['semester'],
            'credits' => $plan['credits'],
            'user_id' => $plan['user_id'],
            'Lecturer_id' => $plan['Lecturer_id'],
            'department_id' =>  $plan['department_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
