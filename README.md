# 区块链
学习区块链

需要 `php >= 7.0`

运行：
```
php blockchain.php
```

运行`proof of work`的版本：
```
php blockchain_with_proof_of_work.php
```

参考： 
* https://medium.com/crypto-currently/lets-build-the-tiniest-blockchain-e70965a248b
* https://medium.com/crypto-currently/lets-make-the-tiniest-blockchain-bigger-ac360a328f4d
* [工作量证明（Proof of Work，PoW）机制](https://en.bitcoin.it/wiki/Proof_of_work)
* [股权证明（Proof of Stake，PoS）机制](https://en.wikipedia.org/wiki/Proof-of-stake)
* [区块链技术指南](https://yeasy.gitbooks.io/blockchain_guide/)

## 1.让我们创建一个最小的区块链

尽管有人认为`区块链是一个等待问题的解决方案`，但毫无疑问，这种新颖的技术是计算的奇迹。
但是，区块链究竟是什么？

### 区块链
> 数字分类账，其中比特币或其他加密货币进行的交易按时间顺序公开记录。

更一般地说，它是一个公共数据库，新数据存储在一个称为块的容器中，并被添加到过去添加数据的不可变链（因此区块链）中。在比特币和其他加密货币的情况下，这些数据是交易组。但是，这些数据当然可以是任何类型的。

区块链技术引发了新的全数字货币，如比特币和莱特币，而这些货币并非由中央机构颁发或管理。这给个人带来了新的自由，他们认为当今的银行体系是一种骗局或者会失败。区块链也以Ethereum等技术的形式革新了分布式计算，这种技术引入了智能合约等有趣的概念。

