<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course'];

    // Store the selected course in the session
    session_start();
    $_SESSION['course'] = $course;

    // Redirect to user information page
    header("Location: course-details.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Selection</title>
    <link rel="stylesheet" href="styles2.css">
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const courseForm = document.getElementById('courseForm');
            const courseSelect = document.getElementById('course');
            const feeDisplay = document.getElementById('fee');
            
            courseSelect.addEventListener('change', updateFee);
            courseForm.addEventListener('submit', handleCourseSelection);

            function updateFee() {
                const course = courseSelect.value;
                let fee = 10000;
            
                switch (course) {
                    case 'CS':
                        fee = 10000;
                        break;
                    case 'BA':
                        fee = 8000;
                        break;
                    case 'ME':
                        fee = 9000;
                        break;
                    case 'EE':
                        fee = 9500;
                        break;
                    case 'MA':
                        fee = 7000;
                        break;
                    case 'PH':
                        fee = 8500;
                        break;
                    case 'CH':
                        fee = 9000;
                        break;
                    case 'BI':
                        fee = 9200;
                        break;
                    case 'EL':
                        fee = 6000;
                        break;
                    case 'HI':
                        fee = 6500;
                        break;
                    case 'PS':
                        fee = 7500;
                        break;
                    case 'EC':
                        fee = 7800;
                        break;
                    case 'SO':
                        fee = 7300;
                        break;
                }
            
                feeDisplay.innerText = '$' + fee;
            }

            function handleCourseSelection(event) {
                event.preventDefault();
                const course = courseSelect.value;
                localStorage.setItem('selectedCourse', course);
                courseForm.submit();
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Select a Course</h1>
        <form id="courseForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="course">Choose a course:</label>
            <select id="course" name="course">
                <option value="CS">Computer Science</option>
                <option value="BA">Business Administration</option>
                <option value="ME">Mechanical Engineering</option>
                <option value="EE">Electrical Engineering</option>
                <option value="MA">Mathematics</option>
                <option value="PH">Physics</option>
                <option value="CH">Chemistry</option>
                <option value="BI">Biology</option>
                <option value="EL">English Literature</option>
                <option value="HI">History</option>
                <option value="PS">Political Science</option>
                <option value="EC">Economics</option>
                <option value="SO">Sociology</option>
            </select>
            <p>Fee: <span id="fee">$0</span></p>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
