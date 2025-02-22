

const express = require('express');
const multer = require('multer');
const cors = require('cors');
const path = require('path');

const app = express();
app.use(cors());

// Set storage for uploaded files
const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, '../../assets/IMG/media/');
    },
    filename: (req, file, cb) => {
        cb(null, Date.now() + path.extname(file.originalname));
    }
});

const upload = multer({ storage: storage });

// Route to handle file upload
app.post('../../mediaController.php', upload.array('images', 10), (req, res) => {
    if (!req.files) {
        return res.status(400).json({ message: "No files uploaded." });
    }

    res.json({
        status: "success",
        message: "Images uploaded successfully!",
        files: req.files.map(file => file.filename)
    });
});

const PORT = 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));