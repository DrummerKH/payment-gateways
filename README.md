
# payment-gateways

There are a few implementations of payment gateway services. It done with help of `payum` library.
Gateways implementations:
#### Enett - virtual cards gateway
The service is for creation, cancelling, activation etc.. virtual cards. All actions that can be done through Enett gateway. The path `GatewaysFactory/Enett`. There are few services `Service/IssueVanService` - for creation of virtual card and `Service/CancelVanService` for cancelling the service. 
#### Aviacenter - virtual cards gateway
The service for creation and managing virtual card also. Has same functionality as `Enett`.
#### Acquiring - acquiring payment gateway
The service of acquiring for Alfabank and Sberbank banking `Acquiring`. There is service for register the request to payment `Service/RegisterService`, if request on bank side consider as valid - money holds and bank sends the callback to `RegisterCallbackService`. Also exists service for deposit moneys (it means withdraw from client) `DepositService`, service for refund some money that has been withdrawn already `RefundService` and service for cancel money that was hold `CancelService`.
#### Rsb
Api implementation for RussStandartBank payment gateway `Rsb`. It has same services as acquiring payment gateway.
#### Paymaster - payment gateway
Api implementation for Paymaster payment gateway `Paymaster`. It has almost same services as acquiring payment gateway.

Each implementation is independent. All gateway implementation have api services that send requests to the gateway in `Api` folder and `Dto` folder where exist Data Transfer Objects for current gateway. Each service must extends `GatewayServiceAbstract` service and each http api service must implements `ApiPaymentInterface`
