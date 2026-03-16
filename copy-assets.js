import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

// Setup file paths (needed since we are using ES modules)
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Define our source and destination folders
const sourceDir = path.join(__dirname, 'src', 'assets');
const destDir = path.join(__dirname, 'public', 'assets');

// Ensure the destination public/assets folder exists
if (!fs.existsSync(destDir)) {
    fs.mkdirSync(destDir, { recursive: true });
}

// Function to duplicate images
function duplicateImages() {
    // Read all files in the source directory
    const files = fs.readdirSync(sourceDir);

    // List of standard image extensions to look for
    const imageExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.svg', '.webp'];

    let copyCount = 0;

    files.forEach(file => {
        const ext = path.extname(file).toLowerCase();
        
        // If the file is an image, copy it over
        if (imageExtensions.includes(ext)) {
            const sourcePath = path.join(sourceDir, file);
            const destPath = path.join(destDir, file);

            fs.copyFileSync(sourcePath, destPath);
            console.log(`Copied: ${file}`);
            copyCount++;
        }
    });

    console.log(`\nSuccess! Duplicated ${copyCount} images to the public/assets folder.`);
}

// Run the function
duplicateImages();