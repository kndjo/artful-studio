<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Leave a Review</h2>
    <form id="review-form">
      <div class="row">
        <div class="col-md-6">
          <label for="name" class="form-label">Your Name:</label>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Your Email:</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="rating" class="form-label">Rating:</label>
        <select id="rating" name="rating" class="form-select" required>
          <option value="1">1 Star</option>
          <option value="2">2 Stars</option>
          <option value="3">3 Stars</option>
          <option value="4">4 Stars</option>
          <option value="5">5 Stars</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="review" class="form-label">Your Review:</label>
        <textarea id="review" name="review" class="form-control" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
    <div id="feedback" class="mt-3"></div>
  </div>

  <script>
    const form = document.getElementById('review-form');
    const feedbackDiv = document.getElementById('feedback');

    form.addEventListener('submit', (event) => {
      event.preventDefault();
      feedbackDiv.innerHTML = 'Thank you for your review!';
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>