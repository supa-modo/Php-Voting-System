<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    body {
      /* display: flex;
      justify-content: center; */
      align-items: center;
      height: 100vh;
      background-color: lightgray;
    }
    button {
      font-size: 36px;
      margin: 20px;
      padding: 20px;
    }
    
  </style>
</head>
<body>
  <h1 style="text-align: center;">Admin Panel</h1>
  
  <div style="text-align: center;">
    <button onclick="window.location.href = 'voters.php';">Voters list</button>
    <br><br>
    <div>
      <button onclick="window.location.href = 'candidates.php';">Candidates</button>
      <button onclick="window.location.href = 'votes.php';">Votes</button>
    </div>
    <button onclick="window.location.href = 'index.php';">Logout</button>
  </div>
</body>
</html>
