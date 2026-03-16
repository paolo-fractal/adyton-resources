import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

// Setup file paths (needed since we are using ES modules)
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Define our source and destination folders
const sourceDir = path.join(__dirname, 'src', 'assets');
const destDir = path.join(__dirname, 'public', 'assets');

function duplicateImages() {
    console.log('Starting asset duplication...');

    // 1. Check if the source folder actually exists first
    if (!fs.existsSync(sourceDir)) {
        console.error(`❌ Error: Source folder not found at ${sourceDir}`);
        return;
    }

    // 2. CREATE THE DESTINATION FOLDER (if it doesn't exist)
    if (!fs.existsSync(destDir)) {
        console.log(`📁 Creating new folder at: ${destDir}`);
        fs.mkdirSync(destDir, { recursive: true });
    } else {
        console.log(`✅ Folder already exists at: ${destDir}`);
    }

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
            copyCount++;
        }
    });

    console.log(`🎉 Success! Duplicated ${copyCount} images to the public/assets folder.`);
}

// Run the function
duplicateImages();