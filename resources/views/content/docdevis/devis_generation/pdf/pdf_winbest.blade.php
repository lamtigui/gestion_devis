html2canvas(divElement, {
            scale: 2,

        }).then((canvas) => {
            // Get the image data from the canvas
            const imgData = canvas.toDataURL('image/png');

            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'px',
                format:[1122, 794],
                orientation:'landscape' 
                format: [1122, 794],
                orientation: 'landscape'
            });
            pdf.addImage(imgData, 'PNG', 0, 0,1122, 794);

            // Define the dimensions of the image to fit into the PDF page

            // Add the image to the PDF
            pdf.addImage(imgData, 'PNG', 0, 0, 794, 1253);

            // Save the PDF
            pdf.save('devis-ARA .pdf');
            pdf.save('devis-ADN.pdf');
        });
        