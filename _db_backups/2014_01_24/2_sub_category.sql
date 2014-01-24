-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2014 at 04:54 PM
-- Server version: 5.5.35-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `isf`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `description`, `code`) VALUES
(1, 1, 'Animal Behavior', ' The study of animal activities, on the level of the intact organism or its neurological components. This includes rhythmic functions, learning, and intelligence, sensory preferences, and environmental effects on behaviors.', 'BEH'),
(2, 1, 'Development', 'The study of an organism from earliest stages through birth or hatching and into later life. This includes cellular and molecular aspects of development, regeneration, and environmental effects on development.', 'DEV'),
(3, 1, 'Ecology', 'The science of the interactions and relationships among animals and animals and plants with their environments.', 'ECO'),
(4, 1, 'Genetics', 'The study of organismic and population genetics.', 'GENE'),
(5, 1, 'Nutrition and Growth', 'The study of natural and artificial nutrients on animal growth and reproduction. This also includes the effects of biological and chemical control agents on reproduction and populations.', 'NUTR'),
(6, 1, 'Pathology', 'The study of disease states, and their causes, processes, and consequences. This includes effects of parasites or disease-causing microbes.', 'PATH'),
(7, 1, 'Physiology', 'The study of functions in systems of animals, their mechanisms, and how they are affected by environmental factors or natural variations that select for particular genes.', 'PHY'),
(8, 1, 'Systematics and Evolution', 'The study of classification of organisms and their evolutionary relationships. This includes morphological, biochemical, genetic, and modeled systems.', 'SYST'),
(9, 1, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(10, 2, 'Clinical and Developmental Psychology ', 'The study and treatment of emotional or behavioral disorders. Developmental psychology is concerned with the study of progressive behavioral changes in an individual from birth until death.', 'CLIN'),
(11, 2, 'Cognitive, Brain and Cognition, Neuro-psychology', 'The study of cognition, the mental processes that underlie behavior, including thinking, deciding, reasoning, and to some extent motivation and emotion. Neuro-psychology studies the relationship between the nervous system, especially the brain, and cerebral or mental functions such as language, memory, and perception.', 'COG'),
(12, 2, 'Physiological Psychology', 'The study of the biological and physiological basis of behavior.', 'PHY'),
(13, 2, 'Sociology and Social Psychology; Industrial/Organizational Psychology', 'The study of human social behavior, especially the study of the origins, organization, institutions, and development of human society. Sociology is concerned with all group activities-economic, social, political, and religious.', 'SOC'),
(14, 2, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(15, 3, 'Analytical Biochemistry', 'The study of the separation, identification, and quantification of chemical components relevant to living organisms.', 'ANAL'),
(16, 3, 'General Biochemistry', 'The study of chemical processes, including interactions and reactions, relevant to living organisms.', 'GEN '),
(17, 3, 'Medicinal Biochemistry', 'The study of biochemical processes within the human body, with special reference to health and disease. ', 'MED'),
(18, 3, 'Structural Biochemistry', 'The study of the structure and or function of biological molecules.', 'STRU'),
(19, 3, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(20, 4, 'Cellular Biology', 'The study of the organization and functioning of the individual cell.', 'CELL'),
(21, 4, 'Genetics', 'The study of molecular genetics focusing on the structure and function of genes at a molecular level.', 'GENE'),
(22, 4, 'Immunology', 'The study of the structure and function of the immune system, innate and acquired immunity, and laboratory techniques involving the interaction of antigens with antibodies.', 'IMM'),
(23, 4, 'Molecular Biology', 'The study of biology at the molecular level. Chiefly concerns itself with understanding the interactions between the various systems of a cell, including the interrelationships of DNA, RNA and protein synthesis and learning how these interactions are regulated.', 'MOLE'),
(24, 4, 'Other', 'Studies that cannot be assigned to one of the above categories. ', 'OTHR'),
(25, 5, 'Analytical Chemistry', 'The study of the separation, identification, and quantification of the chemical components of materials. ', 'ANAL'),
(26, 5, 'Environmental Chemistry', 'The study of chemical species in the natural environment, including the effects of human activities, such as the design of products and processes that reduce or eliminate the use or generation of hazardous substances.', 'ENV'),
(27, 5, 'Inorganic Chemistry', 'The study of the properties and reactions of inorganic and organometallic compounds. ', 'INOR'),
(28, 5, 'Materials Chemistry', 'The study of the design, synthesis and properties of substances, including condensed phases (solids, liquids, polymers) and interfaces, with a useful or potentially useful function, such as catalysis or solar energy. ', 'MAT'),
(29, 5, 'Organic Chemistry', 'The study of carbon-containing compounds, including hydrocarbons and their derivatives.', 'ORGA'),
(30, 5, 'Physical Chemistry', 'The study of the fundamental physical basis of chemical systems and processes, including chemical kinetics, chemical thermodynamics, electrochemistry, photochemistry, spectroscopy, statistical mechanics and astro-chemistry.', 'PHY'),
(31, 5, 'Other', 'Studies that cannot be assigned to one of the above subcategories, such as nuclear chemistry, surface chemistry and theoretical chemistry.', 'OTHR'),
(32, 6, 'Algorithms, Data Bases', 'The study of algorithms and databases. Software developed to manage any form of data including text, images, sound and video.', 'ALGO'),
(33, 6, 'Artificial Intelligence', 'The study of the ability of a computer or other machine to perform those activities that are normally thought to require intelligence, such as solving problems, discriminating among objects, and/or responding to voice commands. This also includes speech analysis and synthesis.\r\n', 'ARTI'),
(34, 6, 'Networking and Communications', 'The study of systems that transmits any combination of voice, video, and/or data among users.', 'NET'),
(35, 6, 'Computational Science, Computer Graphics', 'The study of the use of computers to perform research in other fields, such as computer simulations. Also includes the study of computer graphics or the transfer of pictorial data into and out of a computer by various means (analog-to-digital, optical scanning, etc), such as in computer image processing.', 'SCIE'),
(36, 6, 'Software Engineering, Programming Languages', 'The study of software designed to control the hardware of a specific data processing system in order to allow users and application programs to make use of it. This sub-category includes web technologies, programming languages and human-computer interactions.', 'SOFT'),
(37, 6, 'Computer System, Operating System', 'The study of system software responsible for the direct control and management of hardware and basic system operations of a computer.', 'SYST'),
(38, 6, 'Other', 'Other', 'OTHR'),
(39, 7, 'Climatology, Meteorology, Weather', 'The scientific study of the atmosphere that focuses on weather processes and forecasting.', 'CLIM'),
(40, 7, 'Geochemistry, Mineralogy', 'The study of the chemical composition of the earth and other planets, chemical processes and reactions that govern the composition of rocks and soils. Mineralogy is focused around the chemistry, crystal structure and physical (including optical) properties of minerals.', 'GEO'),
(41, 7, 'Historical Paleontology', 'The study of life in the geologic past as recorded by fossil remains.', 'HIST'),
(42, 7, 'Geophysics', 'Branch of geology in which the principles and practices of physics are used to study the earth and its environment.', 'PHY'),
(43, 7, 'Planetary Science', 'The study of planets or planetary systems and the solar system.', 'PLAN '),
(44, 7, 'Tectonics', 'The study of the earth''s structural features as related to plate structure, plate movement, volcanism, etc.', 'TECH'),
(45, 7, 'Other', 'Other', 'OTHR'),
(46, 8, 'Electrical Engineering, Computer Engineering, Controls', 'Electrical engineering is the branch of engineering that deals with the technology of electricity, especially the design and application of circuitry and equipment for power generation and distribution, machine control, and communications. A computer engineer is an electrical engineer with a focus on digital logic systems or a software architect with a focus on the interaction between software programs and the underlying hardware architecture.', 'ELEC'),
(47, 8, 'Mechanical Engineering', 'The branch of engineering that encompasses the generation and application of heat and mechanical power and the design, production, and use of machines and tools.', 'MECH'),
(48, 8, 'Robotics', 'The science or study of the technology associated with the design, fabrication, theory, and application of robots and of general purpose, programmable machine systems.', 'ROB'),
(49, 8, 'Thermodynamics, Solar', 'Thermodynamics involves the physics of the relationships and conversions between heat and other forms of energy. Solar is the technology of obtaining usable energy from the light of the sun.', 'THRM'),
(50, 8, 'Other', 'Other', 'OTHR'),
(51, 9, 'Bioengineering', 'Involves the application of engineering principles to the fields of biology and medicine, as in the development of aids or replacements for defective or missing body organs; the development and manufacture of prostheses, medical devices, diagnostic devices, drugs and other therapies as well as the application of engineering principles to basic biological science problems.', 'BIO'),
(52, 9, 'Chemical Engineering', 'Deals with the design, construction, and operation of plants and machinery for making such products as acids, dyes, drugs, plastics, and synthetic rubber by adapting the chemical reactions discovered by the laboratory chemist to large-scale production.', 'CHEM'),
(53, 9, 'Civil Engineering', 'Construction Engineering - Includes the planning, designing, construction, and maintenance of structures and public works, such as bridges or dams, roads, water supply, sewer, flood control and, traffic.', 'CIVI'),
(54, 9, 'Industrial Engineering', 'Processing - Concerned with efficient production of industrial goods as affected by elements such as plant and procedural design, the management of materials and energy, and the integration of workers within the overall system. The industrial engineer designs methods, not machinery.', 'IND'),
(55, 9, 'Material Science', 'A multidisciplinary field relating the performance and function of matter in any and all applications to its micro, nano, and atomic structure, and vice versa. It often involves the study of the characteristics and uses of various materials, such as metals, ceramics, and plastics and their potential engineering applications.', 'MAT'),
(56, 9, 'Other', 'Other', 'OTHR'),
(57, 10, 'Aerospace and Aeronautical Engineering, Aerodynamics', 'The design of aircraft and space vehicles and the direction of the technical phases of their manufacture and operation.', 'AERO'),
(58, 10, 'Alternative Fuels', 'Any method of powering an engine that does not involve petroleum (oil). Some alternative fuels are electricity, hythane, hydrogen, natural gas, and wood.', 'ALT'),
(59, 10, 'Fossil Fuel Energy', 'Energy from a hydrocarbon deposit, such as petroleum, coal, or natural gas, derived from living matter of a previous geologic time and used for fuel.', 'FOS'),
(60, 10, 'Vehicle Development', 'Engineering of vehicles that operate using energy other than from fossil fuel.', 'VEH'),
(61, 10, 'Renewable Energies', 'Renewable energy sources capture their energy from existing flows of energy, from on-going natural processes such as sunshine, wind, flowing water, biological processes, and geothermal heat flows.', 'REN'),
(62, 10, 'Other', 'Other', 'OTHR'),
(63, 11, 'Bioremediation', 'The use of biological agents, such as bacteria or plants, to remove or neutralize contaminants, as in polluted soil or water. Includes phytoremediation, constructed wetlands for wastewater treatment, biodegradation, etc.', 'BIO'),
(64, 11, 'Ecosystems Management', 'The integration of ecological, economic, and social principles to manage biological and physical systems in a manner that safeguards the long-term ecological sustainability, natural diversity, and productivity of the landscape. An ecological approach to managing the environment.', 'ECO'),
(65, 11, 'Environmental Engineering', 'The application of engineering principals to solve practical problems in the supply of water, the disposal of waste, and the control of pollution. Includes alternative engineering methodologies to meet society''s needs in an environmentally sound and sustainable manner. Preservation of the environment by preventing the contamination of, and facilitating the clean up of, air, water, and land resources.', 'ENG'),
(66, 11, 'Land Resource Management and Forestry ', 'A landscape approach to sustainable resource management, coastal management, biological diversity management, land use planning, or forest succession management. It often includes a resource planning component as well as implementation methodologies. An example would be the management of longleaf pine forests including controlled burns to imitate natural processes.', 'LAND'),
(67, 11, 'Recycling and Waste Management', 'The extraction and reuse of useful substances from discarded items, garbage, or waste. The process of managing, and disposing of, wastes and hazardous substances through methodologies such as landfills, sewage treatment, composting, waste reduction, etc.', 'REC'),
(68, 11, 'Other', 'Other', 'OTHR'),
(69, 12, 'Air Pollution and Air Quality', 'The study of contamination of the air by such things as noxious gases, elements, minerals, chemicals, solid and liquid matter (particulates), etc. Air pollution is the study of such contaminates in concentrations that endanger the health of humans, plants, and/or animals.', 'AIR'),
(70, 12, 'Soil Contamination and Soil Quality', 'The study of contamination of the soil by such things as noxious elements, minerals, chemicals, solids, liquids, etc. Soil contamination is the study of such contaminates in concentrations that endanger the health of humans, plants, and/or animals.', 'SOIL'),
(71, 12, 'Water Pollution and Water Quality', 'The study of contamination of the water by such things as noxious elements, minerals, chemicals, solids, etc. Water pollution is the study of such contaminates in concentrations that endanger the health of humans, plants, and/or animals.', 'WATE'),
(72, 12, 'Other', 'Other', 'OTHR'),
(73, 13, 'Algebra', 'The study of algebraic operations and/or relations and the structures which arise from them. An example is given by (systems of) equations which involve polynomial functions of one or more variables. ', 'ALG'),
(74, 13, 'Analysis', 'The study of infinitesimal processes in mathematics, typically involving the concept of a limit. This begins with differential and integral calculus, for functions of one or several variables, and includes differential equations.', 'ANAL'),
(75, 13, 'Computer Mathematics', 'Branch of mathematics that concerns itself with the mathematical techniques typically used in the application of mathematical knowledge to other domains. Not every project that uses some mathematics belongs here; this category is for projects where the mathematics is the primary component.', 'COMP'),
(76, 13, 'Combinatorics, Graph Theory and Game Theory', 'The study of combinatorial structures in mathematics, such as finite sets, graphs, and games, often with a view toward classification and/or enumeration.', 'COMB'),
(77, 13, 'Geometry and Topology', 'The study of the shape, size, and other properties of figures and spaces. Includes such subjects as Euclidean geometry, non-Euclidean geometries (spherical, hyperbolic, Riemannian, Lorentzian), and knot theory (classification of knots in 3-space).', 'GEO'),
(78, 13, 'Number Theory', 'The study of the arithmetic properties of integers and related topics such as cryptography.', 'NUM'),
(79, 13, 'Probability and Statistics', 'Mathematical study of random phenomena and the study of statistical tools used to analyze and interpret data.', 'PROB'),
(80, 13, 'Other', 'Studies that cannot be assigned to one of the above categories.', 'OTHR'),
(81, 14, 'Disease Diagnosis and Treatment', 'The act or process of identifying or determining the nature and cause of a disease or injury through evaluation of patient history, examination, and review of laboratory data. Administration or application of remedies to a patient or for a disease or injury; medicinal or surgical management; therapy.', 'DIS'),
(82, 14, 'Epidemiology', 'The study of the causes, distribution, and control of disease in populations. Epidemiologists, using sophisticated statistical analyses, field investigations, and complex laboratory techniques, investigate the cause of a disease, its distribution (geographic, ecological, and ethnic), method of spread, and measures for control and prevention.', 'EPID'),
(83, 14, 'Genetics', 'The study of heredity, especially the mechanisms of hereditary transmission and the variation of inherited traits among similar or related organisms.', 'GENE'),
(84, 14, 'Molecular Biology of Diseases', 'The study of diseases at the molecular level.', 'MOLE'),
(85, 14, 'Physiology and Pathophysiology', 'The science of the mechanical, physical, and biochemical functions of normal tissues or organs. Pathophysiology is the study of the disturbance of normal mechanical, physical, and biochemical functions that a disease causes, or that which causes the disease.', 'PHYS'),
(86, 14, 'Other', 'Other', 'OTHR'),
(87, 15, 'Antimicrobial Agents', 'The study of substances that kill or inhibit the growth of microorganisms.', 'ANTI'),
(88, 15, 'Applied Microbiology', 'The study of microorganisms having potential applications in human, animal or plant health or energy production.', 'APP'),
(89, 15, 'Bacterial Microbiology', 'The study of bacteria and bacterial diseases.', 'BACT'),
(90, 15, 'Environmental Microbiology', 'The study of the structure, function, diversity and relationship of microorganisms with respect to their environment.', 'ENV'),
(91, 15, 'Microbial Genetics', 'The study of how genes are organized and regulated in microorganisms in relation to their cellular function.', 'GENE'),
(92, 15, 'Virology', 'The study the anatomy, physiology of viruses and the diseases they cause.', 'VIRO'),
(93, 16, 'Atomic Molecular and Optical Physics', 'The study of atoms, simple molecules, electrons and light, and their interactions.', 'AMO'),
(94, 16, 'Astronomy and Cosmology', 'The study of space,  the universe as a whole, including its origins and evolution, the physical properties of objects in space and computational astronomy', 'ASTR'),
(95, 16, 'Biological Physics', 'The study of the physics of biological processes.', 'BIO'),
(96, 16, 'Instrumentation and Electronics', 'Instrumentation is the process of developing means of precise measurement of various variables such as flow and pressure while maintaining control of the variables at desired levels of safety and economy. Electronics is the branch of physics that deals with the emission and effects of electrons and with the use of electronic devices.', 'INST'),
(97, 16, 'Condensed Matter and Materials', 'The study of the preparation, properties and performance of materials to help understand and optimize their behavior. Topics such as superconductivity, semi-conductors, complex fluids, and thin films are studied.', 'MAT'),
(98, 16, 'Magnetics, Electromagnetics and Plasmas', 'The study of electrical and magnetic fields and of matter in the plasma phase and their effects on materials in the solid, liquid or gaseous states.', 'MAG'),
(99, 16, 'Mechanics', 'Classical physics and mechanics, including the macroscopic study of forces, vibrations and flows; on solid, liquid and gaseous materials', 'MECH'),
(100, 16, 'Nuclear and Particle Physics', 'The study of the physical properties of the atomic nucleus and of fundamental particles and the forces of their interaction', 'NUCL'),
(101, 16, 'Optics, Lasers, and Masers', 'The study of the physical properties of light, lasers and masers.', 'OPT'),
(102, 16, 'Theoretical Physics, Theoretical or Computational Astronomy', 'The study of nature, phenomena and the laws of physics employing mathematical models and abstractions rather than experimental processes. ', 'THEO'),
(103, 16, 'Other', 'Studies that cannot be assigned to one of the above categories. ', 'OTHR'),
(104, 17, 'Agronomy', 'The application of the various soil and plant sciences to soil management and agricultural and horticultural crop production. Includes biological and chemical controls of pests, hydroponics, fertilizers and supplements.', 'AGR'),
(105, 17, 'Development and Growth', 'The study of a plant from earliest stages through germination and into later life. This includes cellular and molecular aspects of development and environmental effects, natural or manmade, on development and growth.', 'DEV'),
(106, 17, 'Ecology', 'The study of interactions and relationships among plants, and plants and animals, with their environment.', 'ECO'),
(107, 17, 'Genetics/Breeding', 'The study of organismic and population genetics of plants. The application of plant genetics and biotechnology to crop improvement.', 'GEN'),
(108, 17, 'Pathology', 'The study of plant disease states, and their causes, processes, and consequences. This includes effects of parasites or disease-causing microbes.', 'PATH'),
(109, 17, 'Plant Physiology', 'The study of functions of plants, their mechanisms, and how they are affected by environmental factors or natural variations. This includes all aspects of photosynthesis.', 'PHY'),
(110, 17, 'Systematics and Evolution', 'The study of classification of organisms and their evolutionary relationships. This includes morphological, biochemical, genetic, and modeled systems.', 'SYST'),
(111, 17, 'Other', 'Studies that cannot be assigned to one of the above categories, such as the effects of plants or plant-derived substances on animal and human health.', 'OTHR');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
