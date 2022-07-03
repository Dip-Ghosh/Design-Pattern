## Abstract Factory Pattern

### Definition <br>
Abstract Factory is a creational design pattern that lets you produce families of related objects without specifying their concrete classes.
### Purpose
To create series of related or dependent objects without specifying their concrete classes. Usually the created classes all implement the same interface. The client of the abstract factory does not care about how these objects are created, it just knows how they go together.

For simple cases, this abstract class could be just an interface.

This pattern achieves the Dependency Inversion principle. It means the FactoryMethod class depends on abstractions, not concrete classes. This is the real trick compared to SimpleFactory or StaticFactory.

### Example:
Furniture shop from where you can buy multiple items<br>
Restaurant that can serve multiple items

### Diagram Example

<img src="./uml13.png"  width=" 350px"/>



### Code Example

([Example ](./ManufactureController.php))
