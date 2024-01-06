const JSZip = require('jszip');
const fs = require('fs-extra');
const path = require('path');
const wpPot = require('wp-pot');
const projectSlug = "wc-fashion";

// Define the input directories where your theme's PHP files are located
const inputDirs = '**/*.php';

// Define the output POT file name
const outputPotFile = `languages/${projectSlug}.pot`;

try {
  // Create the 'languages' directory if it doesn't exist
  fs.mkdirSync('languages', { recursive: true });

  // Generate the POT file
  wpPot({
    destFile: outputPotFile,
    domain: projectSlug,
    package: 'WC Fasion',
    src: inputDirs
  });

  console.log('POT file successfully generated.');
} catch (error) {
  console.error('Error generating POT file:', error.message);
}



