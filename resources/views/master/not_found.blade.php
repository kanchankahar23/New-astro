<style>

.no-data-container {
      text-align: center;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .no-data-container img {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
    }

    .no-data-container h1 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .no-data-container p {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }

    .no-data-container a {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      color: #ffffff;
      background-color: #4B49AC;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .no-data-container a:hover {
      background-color:#4B49AC;
    }

</style>
<div class="no-data-container col-xl-12">
    <img src="{{ asset('website\astro_icon.jpg') }}" alt="No Data" class="image-fluid" style=" height: 100px;">
    <h1>No Data Found</h1>
    <p>Sorry, we couldn't find any data. Please try again later.</p>
    <a href="{{ url('admin/dashboard') }}">Go Back</a>
</div>

