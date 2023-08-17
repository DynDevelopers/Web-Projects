# Abstract

The Chihuahua and Muffin Classifier project utilizes Convolutional Neural Networks (CNNs) to develop a robust model capable of accurately discerning between Chihuahua and muffin images. This undertaking showcases the AI's prowess in learning hierarchical features, ranging from basic textures in initial layers to intricate differentiating patterns in deeper layers.This project aims to enhance image classification using a specialized CNN architecture inspired by modified VGG19. It excels at capturing subtle features, crucial for effective classification. Data augmentation diversifies the training dataset, improving model adaptability. Addressing class imbalance through weights ensures accuracy for both Chihuahuas and muffins. Through comprehensive binary image classification, the project provides insights with broad implications for computer vision.

# Prerequisites

Before you begin using the Chihuahua vs. Muffin Classifier project, ensure you have the following prerequisites in place:

- **Python Environment:** Make sure you have a working Python environment set up on your system. You can download and install Python from the official website.

- **Required Libraries:** Install the necessary Python libraries and dependencies using the following command:
`pip install tensorflow numpy matplotlib keras`


- **GPU Acceleration (Optional but Recommended):** For faster model training, especially when dealing with complex CNN architectures, consider using platforms like Kaggle or Google Colab that offer free access to GPUs. To utilize GPU acceleration, you can select GPU as your runtime environment in Google Colab or configure GPU settings in your Kaggle notebooks.

- **Image Dataset:** Prepare your Chihuahua and muffin image datasets following the instructions in the **How to Use** section below.

- **Code Editor:** Use a code editor or integrated development environment (IDE) to modify and run the project script. We recommend using tools like Visual Studio Code, PyCharm, or Jupyter Notebook.

# How to Use

Follow these steps to set up and use the Chihuahua vs. Muffin Classifier:

1. **Dataset Preparation:**
 - Create two folders named "chihuahua" and "muffin" in the same directory where your project files are located.
 - Inside each of these folders ("chihuahua" and "muffin"), create three sub-folders: "train," "validation," and "test."
 - Place your respective Chihuahua and muffin images in their corresponding "train," "validation," and "test" folders. Organize the images according to their respective classes.

2. **Running the Code:**
 - Open the "project.ipynb" Python script in a text editor or integrated development environment.
 - Modify the paths in the provided code to match the file structure you created. Locate the lines in the code where paths are specified and update them with the paths to your "chihuahua" and "muffin" folders, including the "train," "validation," and "test" sub-folders.
 - Ensure that you have the required libraries and dependencies installed to run your project successfully. If needed, install missing packages using tools like pip or conda.
 - Run the "project.ipynb" script using your preferred Python environment (e.g., Anaconda, command line, or an integrated development environment like Visual Studio Code, Jupyter notebook).

**Note:** Make sure to carefully adjust the file paths and code as needed to match your project's structure and requirements. Following these steps will allow you to create, organize, and train your Chihuahua vs. Muffin classifier.

# Introduction

In the ever-changing field of artificial intelligence, the potential to recognize subtle visual distinctions and complexities holds great promise. The "AI Image Challenge Recognition" project embarks on an engaging exploration into the world of AI-powered image classification. It delves into the intricate task of differentiating subjects that may seem nearly identical, unveiling the impressive capabilities of modern machine learning.

In a world where images saturate our digital landscape, the ability to accurately categorize and understand image content is an exciting goal. The project begins with a fascinating challenge: distinguishing between Chihuahuas and muffins, objects that could easily be mistaken for one another. This puzzle serves as a miniature representation of AI's ability to dissect intricate visual patterns, ranging from textures to shapes, resulting in impressive classification accuracy.

![chihuahua_vs_muffin](https://github.com/ACM40960/project-Divya14473/assets/77743546/03ed3ea8-e61e-47bd-ae7d-218e5bd653fc)

**Figure 1. Chihuahua vs Muffin**

At the heart of this initiative are Convolutional Neural Networks (CNNs), a class of deep learning architectures meticulously designed for visual data. These networks demonstrate their prowess by independently grasping hierarchies of features, progressively uncovering more complex attributes.

Furthermore, the project delves into the crucial role of data augmentation, where we enhance the diversity of the training dataset using techniques like rotation, shifting, and flipping. By introducing controlled variations, we equip the AI with adaptability, enhancing its resilience in real-world scenarios.

Leveraging TensorFlow's ImageDataGenerator, we not only enrich our dataset but also explore the frontiers of AI's ability to generalize, optimize, and excel in demanding contexts. This effort underscores the mutually beneficial partnership between human-crafted algorithms and AI's capacity to learn from data.

As you explore this repository, you will observe the intricacies of model architectures, the finesse of data manipulation, and the valuable insights gained from evaluating our models.

# Dataset

The dataset comprises a total of 6400 images, forming the foundation for our exploration into intricate image recognition. A balanced dataset was meticulously created, ensuring equitable representation of Chihuahuas and muffins, which is crucial for unbiased model training.

- **Training Set (60%):** The training set consists of 3840 images and plays a pivotal role in nurturing AI's understanding. This subset captures nuanced patterns and textures, providing the model with a comprehensive understanding of both Chihuahuas and muffins.

- **Validation Set (20%):** The validation set contains 1280 images and serves as a rigorous assessment of the model's generalization capabilities. It provides valuable insights into how well the model can perform on unseen data.

- **Testing Set (20%):** The testing set, comprising 1280 images, is an essential component of our evaluation. By evaluating the model's performance on this independent subset, we gain a reliable measure of its real-world capabilities.

In addition to our balanced dataset, we have extended our project to include an imbalanced dataset. This dataset, consisting of 5781 images, introduces an extra layer of intricacy to our image recognition task. Within this dataset:

- **Training Set (59.2%):** We allocate 3421 images for training, allowing the model to learn from diverse examples within an imbalanced context.

- **Validation and Testing Sets (20% each):** The remaining 1180 images are evenly split between the validation and testing subsets. This ensures a consistent and reliable evaluation of the model's performance on imbalanced data.

These carefully curated datasets serve as the cornerstone of our project, enabling us to showcase the effectiveness of our AI models in distinguishing between Chihuahuas and muffins.

![Original Data](https://github.com/ACM40960/project-Divya14473/assets/77743546/6b7bb56a-274e-493e-8f6d-6212d1c60b8a)

**Figure 2. Original Data**

## Methodology

Our project rigorously guides the training of AI models for intricate image classification tasks. Employing a systematic methodology, we design specialized Convolutional Neural Networks (CNNs) to skillfully extract hierarchical features from raw pixel data, enabling precise object differentiation similar to human perception. Our comparative analysis offers insights into the effectiveness of sequential CNNs versus transfer learning models, revealing their strengths and potential applications.

At the core of our approach lies the strategic utilization of the VGG19 pre-trained architecture, finely tuned for our unique challenges. This enhancement empowers our models not only to understand but also excel in deciphering intricate visual details, showcasing AI's capacity to unravel complex image patterns. As a result, our project paves the way for advanced image classification, harmonizing innovative techniques with a deep understanding of AI-powered visual recognition.

### VGG19

VGG19 is a convolutional neural network architecture that has made significant contributions to the field of deep learning and computer vision. It was developed by the Visual Geometry Group (VGG) at the University of Oxford and is renowned for its simplicity and effectiveness. VGG19 is a variant of VGG model which in short consists of 19 layers (16 convolution layers, 3 Fully connected layers, 5 MaxPool layers and 1 SoftMax layer)

![VGG19_Architecture](https://github.com/ACM40960/project-Divya14473/assets/77743546/22a51059-2a46-4b1d-9d7b-c185e34b08a2)

**Figure 3. VGG19 Architecture**

### Sequential

![Sequential_Architecture](https://github.com/ACM40960/project-Divya14473/assets/77743546/3863cafe-7bd8-490e-933f-e909dc9a6831)

**Figure 4. Sequential Architecture**

### Terminology

- **Conv2D:** Conv2D is a building block in neural networks for images. It's like a filter that slides over an image, learning to recognize different patterns and features. This helps the network understand and process visual information, like identifying edges, textures, and shapes, making it crucial for tasks such as image recognition.

- **Max Pooling:** Max pooling is a technique in neural networks that simplifies information by selecting the most important details from a group of values. It helps reduce the complexity of data while retaining essential features, like identifying the most prominent characteristics in an image, which aids in efficient and effective pattern recognition.

- **Flatten:** Flatten is a process in neural networks that transforms multi-dimensional data into a one-dimensional sequence making it suitable for feeding into traditional fully connected layers for making predictions or classification.

- **Fully Connected layer:** A fully connected layer, also known as a dense layer, is a component in neural networks where each neuron is connected to every neuron in the previous layer. It gathers and processes information from different parts of the input, enabling the network to learn complex relationships and make final predictions or classifications based on the learned features.

- **Data Augmentation:** Data augmentation is a technique used to enhance the diversity of the training dataset, thereby improving the robustness and generalization of the trained AI model. In this project, we apply several data augmentation techniques to our images:

  - **Rescale:** To ensure consistent pixel value ranges, we rescale each pixel value in the images by dividing it with 255.0, bringing all values within the [0, 1] range.

  - **Random Rotation:** Images undergo random rotation within a range of ±20 degrees. This simulates different angles of capture, enriching the dataset with varied viewpoints.

  - **Width Shift:** We introduce randomness by shifting image widths by a maximum of 20% in both left and right directions. This creates diverse training samples, accounting for potential horizontal displacement.

  - **Height Shift:** Similar to width shift, height shift randomly adjusts the image's height by a maximum of 20% in upward and downward directions.

  - **Horizontal Flip:** Images are horizontally flipped with a 50% probability. This technique generates mirror images, augmenting the dataset's diversity.

  These data augmentation techniques collectively contribute to a more comprehensive training experience, allowing the AI model to better adapt and perform accurately across various real-world scenarios.

![Augmented Data](https://github.com/ACM40960/project-Divya14473/assets/77743546/4b0bf0b4-d4e7-4379-851b-8cdef8a09a94)

**Figure 5. Augmented Data**

### Activation Functions

An activation function defines the output of a neural network node given its input. We utilize specific activation functions tailored to the nature of our classification task:

- **ReLU (Rectified Linear Activation):** ReLU is employed for hidden layers. It introduces non-linearity and has been proven effective in capturing complex relationships within the data.

- **Softmax:** The softmax activation function is applied to the fully connected layer for categorical classification tasks. It transforms raw scores into probability distributions, enabling multi-class predictions.

- **Sigmoid:** For binary classification tasks, we opt for the sigmoid activation function. It maps input values to a range between 0 and 1, making it suitable for predicting binary outcomes.

### Optimizer

The optimizer determines the model's parameter updates during training. We utilize the Adam optimizer known for its efficiency and adaptability in minimizing the loss function.

### Loss Function

The loss function measures the difference between predicted and actual values, guiding the model to improve its predictions. The choice of our loss function is adapted to suit the specific classification task at hand:

- **Categorical Cross-Entropy:** For categorical classification tasks, we use categorical cross-entropy to measure the difference between predicted and actual class probabilities.

- **Binary Cross-Entropy:** For binary classification tasks, we employ binary cross-entropy to quantify the discrepancy between predicted and actual binary labels.

### Metrics

Metrics quantify the model's performance during training and evaluation. We track accuracy and recall metrics to assess how well the model is classifying images.

- **Accuracy:** For balanced data, we rely on accuracy as our metric. It provides an overall assessment of the model's correctness by measuring the proportion of correctly predicted instances among all instances.

- **Recall:** In the case of imbalanced data, we prioritize recall as our metric. Recall focuses on the true positive rate, effectively capturing the model's ability to correctly identify positive instances, crucial for scenarios where certain classes are underrepresented.

### Early Stopping

We implement the early stopping technique with the following configuration:

- **Monitor:** We track the validation loss ('val_loss') to decide when to stop training.

- **Patience:** If the validation loss does not improve for 10 consecutive epochs, training is halted.

- **Restore Best Weights:** Upon stopping, the model's weights are restored to the ones that yielded the best performance on the validation set.

This approach safeguards against overfitting and ensures that the model generalizes well to unseen data.

### Dropout

Incorporating a dropout layer with a rate of 0.5, we introduce a regularization technique that aids in preventing overfitting. This layer randomly deactivates 50% of the neurons during each training iteration, enhancing the model's generalization by reducing reliance on specific neurons. This strategy fosters a more robust and adaptable model, capable of handling diverse data scenarios.

### Class Weights for Imbalanced Dataset

In dealing with the complexities of an imbalanced dataset, we harness the strength of class weights to foster fair model training. These weights, derived thoughtfully from the dataset's class distribution, counteract the impact of class imbalance. By allocating greater weights to the minority class and lesser weights to the majority class, we create a harmonious learning environment. This strategy empowers our models to adeptly discern patterns from both classes, counteracting any potential bias. Consequently, class weights cultivate a well-rounded learning process, expanding the model's comprehension across diverse classes and ultimately enhancing its predictive prowess.

### Results

Our project concludes with a comprehensive evaluation of our model's performance, highlighting the intricate interplay between AI's potential and real-world challenges.

Our sequential CNN model, shaped through extensive training, emerges as a strong contender in deciphering complex images. Accuracy graphs depict its progressive convergence, yielding impressive train, test, and validation accuracies of 89%, 92%, and 93% respectively. This underscores its adeptness in capturing intricate patterns across diverse subjects.

![Accuracy and Loss of Sequential CNN](https://github.com/ACM40960/project-Divya14473/assets/77743546/602e95c6-a085-4c03-8d38-d0276565692f)

**Figure 6. Accuracy and Loss of Sequential CNN**

Leveraging VGG19's pre-trained expertise, our transfer learning model excels in intricate classification. Accuracy graphs showcase its efficient convergence, resulting in notable train, test, and validation accuracies of 90%, 93%, and 94.5% respectively. This validates its capability to leverage learned features for complex recognition tasks.

![Accuracy and Loss of VGG19](https://github.com/ACM40960/project-Divya14473/assets/77743546/8df03de0-3b26-47c7-b949-b157bdb7c007)

**Figure 7. Accuracy and Loss of VGG19**

Navigating an imbalanced dataset, our evaluation reveals nuanced performance trends. Emphasizing recall for capturing positive instances, the model demonstrates strong train, test, and validation recalls of 88%, 90%, and 92.6% respectively, showcasing its proficiency in identifying instances within an imbalanced context.

In binary classification, where precision is vital, our model maintains steady performance. Balancing precision and recall trade-offs, it achieves train, test, and validation accuracies of 84%, 85.5%, and 86.7% respectively. This underscores its precision in distinguishing subtle differences, even among closely related classes.

*Note:* Due to the dataset's inherent randomness, there could be minor fluctuations in the percentages.

### Conclusion and Future Scope

Our project reveals profound insights at the intersection of advanced AI methods and intricate image classification. By meticulously designing Convolutional Neural Networks (CNNs), harnessing transfer learning with pre-trained models, and employing data augmentation and class weighting, we have harnessed AI's power to decode intricate visual patterns. Our model evaluations across balanced and imbalanced datasets highlight their ability to differentiate diverse subjects, from Chihuahuas and muffins to closely resembling entities. The recall, and accuracy metrics emphasize the strength of our models, both individually and in comparative assessment.

As we look ahead, the possibilities for exploration are limitless. Going deeper into our CNN architectures, innovating with new data augmentation techniques, and delving into advanced transfer learning strategies offer potential for refining our models' effectiveness. The integration of broader and more diverse datasets holds the potential to create AI models that better grasp the intricacies of the real world. Additionally, fine-tuning parameters and hyperparameters could lead to gradual improvements in performance. Beyond the technical realm, the application of AI in specialized fields like medical image analysis or environmental monitoring invites us to lead AI's transformative potential into uncharted territories.

### References

1. [Kaggle Dataset](https://www.kaggle.com/datasets/samuelcortinhas/muffin-vs-chihuahua-image-classification)
2. [GitHub Repository](https://github.com/rcgc/chihuahua-muffin)
3. Togootogtokh, Enkhtogtokh, and Amarzaya Amartuvshin. "Deep learning approach for very similar objects recognition application on chihuahua and muffin problem." arXiv preprint arXiv:1801.09573 (2018).
4. Mateen, Muhammad, Junhao Wen, Nasrullah, Sun Song, and Zhouping Huang. "Fundus image classification using VGG-19 architecture with PCA and SVD." Symmetry 11, no. 1 (2018): 1.
5. Jia, Xin. "Image recognition method based on deep learning." In 2017 29th Chinese control and decision conference (CCDC), pp. 4730-4735. IEEE, 2017.

