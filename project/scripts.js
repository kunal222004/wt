
function showDetails(courseId) {
    // You can use AJAX to fetch course details from the server or directly update the content using JavaScript
    const courseDetails = document.getElementById('course-details');
    const selectedCourse = courses.find(course => course.id === courseId);

    courseDetails.innerHTML = `
        <h2>${selectedCourse.title}</h2>
        <img src='images/${selectedCourse.image}' alt='${selectedCourse.title}'>
        <p>${selectedCourse.description}</p>
        <button onclick='enroll(${selectedCourse.id})'>Enroll Now</button>
    `;

    courseDetails.style.display = 'block';
}

function enroll(courseId) {
    // Add your enrollment logic here (e.g., store enrollment details in the database)
    alert(`Enrolled in course with ID ${courseId}!`);
}