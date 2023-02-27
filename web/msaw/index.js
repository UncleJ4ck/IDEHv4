const express = require('express');
const path = require('path');
const fs = require('fs');
const helmet = require('helmet');
const bodyParser = require('body-parser');
const rateLimit = require('express-rate-limit');

const app = express();
const port = 3000;

app.use(helmet());
app.use(express.static('public'));
app.use(bodyParser.urlencoded({ extended: true }));

const limiter = rateLimit({
  windowMs: 2 * 60 * 1000,
  max: 10,
  message: 'WOWOWOWO SLOW DOWN BOI',
});
app.use('/check', limiter);

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.post('/check', (req, res) => {
  let input = req.body.input;
  if (input === 'leetjakidzenhakor') {
    res.send('IDEH{r4k_kh4t1r_f1_l0w_l4v4l_dlw38}');
  } else {
    res.send("nah it's wrong ");
  }
});

app.use((req, res, next) => {
  const filePath = path.join(__dirname, 'public', '404.html');
  fs.access(filePath, fs.constants.F_OK, (err) => {
    if (err) {
      res.status(404).send('404 Not Found');
    } else {
      res.status(404).sendFile(filePath);
    }
  });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
