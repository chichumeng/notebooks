<?php
// 继承 泛化 Generalization
namespace Generalization{
    class a{}
    // B 继承 A
    class b extends a{}
}

// 依赖  Dependency
namespace Dependency{
    class a{
        public function call(){}
    }
    class b{
        // 非construct
        public function __construct(){}

        // 生命周期只是其中一个method,用完就结束了
        public function needAdo($a){
            $a->call();
        }
    }
}

// 关联 Association 包含(聚合、组合)
namespace Association{
    class a{
        public function call(){}
    }
    class b{
        // 与依赖不同的是 生命周期更长，一直伴随b结束为止
        private $a;
        public function __construct(){}

        public function needAdo(){
            $this->a->call();
        }
    }
}

// 聚合 Aggregation
namespace Aggregation{
    class a{
        public function call(){}
    }
    class b{
        private $a;
        public function __construct($a){ // 外部传入
            $this->a = $a;
        }
        public function needAdo(){
            $this->a->call();
        }
    }
}

// 组合 Composition
namespace Composition{
    class a{
        public function call(){}
    }
    class b{
        private $a;
        public function __construct(){
            $this->a = new a(); // 类中实例化
        }
        public function needAdo(){
            $this->a->call();
        }
    }
}

