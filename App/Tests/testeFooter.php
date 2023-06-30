<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Página com Footer Responsivo</title>
    <style>
      * {
        box-sizing: border-box;
      }
      
      body {
        margin: 0;
        padding: 0;
        min-height: 100%;
        display: flex;
        flex-direction: column;
      }
      
      .content {
        flex: 1;
        padding: 20px;
        padding-bottom: 70px; /* espaço para o footer */
      }
      
      footer {
        position: fixed;
        width: 100%;
        height: 50px;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 15px;
        bottom: 0;
      }
    </style>
  </head>
  <body>
    <div class="content">
      <h1>Página com Footer Responsivo</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at ex eget velit consectetur euismod. Aenean nec metus quis justo blandit venenatis. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ultricies odio a nunc ultricies, eu venenatis turpis tempus. Sed nec varius purus, a consequat nulla. Donec ornare nisl non est consectetur, non mattis mauris interdum. Ut id dictum est.</p>
      <p>Maecenas quis mi id lectus faucibus tincidunt. Curabitur ac nunc porttitor, accumsan massa vitae, mollis tellus. Aenean auctor erat in ante feugiat, vel varius augue venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris et dignissim lorem, vel tincidunt turpis. Sed interdum quam ut ex posuere, sit amet ultricies orci tristique. Duis non efficitur nulla. Sed ut ex at sapien facilisis tincidunt. Donec bibendum eget dolor in ultrices.</p>
      <!-- Adicione mais conteúdo aqui -->
    </div>
    <footer>
      Footer responsivo
    </footer>
  </body>
</html>